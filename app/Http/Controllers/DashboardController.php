<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Wallet;
use App\Models\Configuration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with transaction charts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mendapatkan konfigurasi periode
        $config = Configuration::first();
        
        // Default nilai jika tidak ada konfigurasi
        $startDay = $config ? $config->start_date : 1;
        $endDay = $config ? $config->end_date : 31;
        
        // Menentukan tanggal saat ini
        $now = Carbon::now();
        $currentDay = (int)$now->format('d');
        $currentMonth = (int)$now->format('m');
        $currentYear = (int)$now->format('Y');
        
        // Menentukan tanggal awal dan akhir untuk periode saat ini
        // Untuk periode saat ini: dari tanggal start_date bulan sebelumnya sampai HARI INI
        // sehingga data selalu real-time, tidak perlu menunggu tanggal akhir periode
        $startDate = Carbon::now()->subMonth()->setDay($startDay);
        $endDate = Carbon::now(); // Selalu tanggal hari ini untuk melihat data real-time
        
        // Data untuk pie chart (transaksi per kategori)
        $transactionsByCategory = Transaction::join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', 'categories.type', DB::raw('SUM(transactions.amount) as total_amount'))
            ->where('transactions.date', '>=', $startDate->format('Y-m-d'))
            ->where('transactions.date', '<=', $endDate->format('Y-m-d'))
            ->groupBy('categories.id', 'categories.name', 'categories.type')
            ->orderBy('total_amount', 'desc')
            ->get();
            
        // Menambahkan data periode saat ini untuk judul chart
        $currentPeriod = $startDate->format('d M') . ' - ' . 
                        ($endDate->isToday() ? 'Hari Ini (' . $endDate->format('d M Y') . ')' : $endDate->format('d M Y'));
        
        // Data untuk chart bulanan - 6 periode terakhir
        $periods = [];
        $incomeTotals = [];
        $expenseTotals = [];
        
        // Membuat array untuk 6 periode bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            if ($i === 0) {
                // Untuk periode saat ini: dari tanggal start_date bulan lalu sampai hari ini
                $periodEndDate = Carbon::now(); // Tanggal hari ini
                $periodStartDate = Carbon::now()->subMonth()->setDay($startDay);
                
                // Label untuk periode saat ini
                $periodLabel = $periodStartDate->format('d M') . ' - Hari Ini (' . $periodEndDate->format('d M Y') . ')';
            } else {
                // Untuk periode-periode sebelumnya
                // Periode ke-i: start_date bulan (i+1) yang lalu sampai endDay bulan i yang lalu
                $periodEndDate = Carbon::now()->subMonths($i)->setDay($endDay);
                $periodStartDate = Carbon::now()->subMonths($i+1)->setDay($startDay);
                
                // Label untuk periode sebelumnya
                $periodLabel = $periodStartDate->format('d M') . ' - ' . $periodEndDate->format('d M Y');
            }
            
            $periods[] = $periodLabel;
            
            // Menghitung pendapatan dan pengeluaran untuk periode ini
            $periodTransactions = Transaction::join('categories', 'transactions.category_id', '=', 'categories.id')
                ->select('categories.type', DB::raw('SUM(transactions.amount) as total_amount'))
                ->whereBetween('transactions.date', [
                    $periodStartDate->format('Y-m-d'), 
                    $periodEndDate->format('Y-m-d')
                ])
                ->groupBy('categories.type')
                ->pluck('total_amount', 'categories.type')
                ->toArray();
            
            $incomeTotals[] = $periodTransactions['in'] ?? 0;
            $expenseTotals[] = $periodTransactions['out'] ?? 0;
        }
        
        // Data untuk chart transaksi per dompet
        $transactionsByWallet = Transaction::join('wallets', 'transactions.wallet_id', '=', 'wallets.id')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select('wallets.name as wallet_name', 'categories.type', DB::raw('SUM(transactions.amount) as total_amount'))
            ->where('transactions.date', '>=', $startDate->format('Y-m-d'))
            ->where('transactions.date', '<=', $endDate->format('Y-m-d'))
            ->groupBy('wallets.id', 'wallets.name', 'categories.type')
            ->get();
            
        // Format data untuk chart dompet
        $walletData = [];
        foreach ($transactionsByWallet as $data) {
            if (!isset($walletData[$data->wallet_name])) {
                $walletData[$data->wallet_name] = [
                    'in' => 0,
                    'out' => 0
                ];
            }
            
            $walletData[$data->wallet_name][$data->type] = $data->total_amount;
        }
        
        return view('dashboard', compact(
            'transactionsByCategory', 
            'periods', 
            'incomeTotals', 
            'expenseTotals',
            'walletData',
            'currentPeriod'
        ));
    }
}
