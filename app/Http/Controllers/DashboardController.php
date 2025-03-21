<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\Wallet;
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
        // Data untuk pie chart (transaksi per kategori)
        $transactionsByCategory = Transaction::join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select('categories.name as category_name', 'categories.type', DB::raw('SUM(transactions.amount) as total_amount'))
            ->groupBy('categories.id', 'categories.name', 'categories.type')
            ->orderBy('total_amount', 'desc')
            ->get();
            
        // Data untuk chart transaksi per bulan (6 bulan terakhir)
        $monthlyData = Transaction::join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select(
                DB::raw('YEAR(transactions.date) as year'),
                DB::raw('MONTH(transactions.date) as month'),
                'categories.type',
                DB::raw('SUM(transactions.amount) as total_amount')
            )
            ->where('transactions.date', '>=', Carbon::now()->subMonths(6)->startOfMonth()->format('Y-m-d'))
            ->groupBy('year', 'month', 'categories.type')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
            
        // Format data untuk chart bulanan
        $months = [];
        $incomeData = [];
        $expenseData = [];
        
        // Initialize data untuk 6 bulan terakhir
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M Y');
            $incomeData[$month->format('Y-m')] = 0;
            $expenseData[$month->format('Y-m')] = 0;
        }
        
        // Isi data dari hasil query
        foreach ($monthlyData as $data) {
            $yearMonth = sprintf('%04d-%02d', $data->year, $data->month);
            if ($data->type === 'in' && isset($incomeData[$yearMonth])) {
                $incomeData[$yearMonth] = $data->total_amount;
            } elseif ($data->type === 'out' && isset($expenseData[$yearMonth])) {
                $expenseData[$yearMonth] = $data->total_amount;
            }
        }
        
        // Konversi array asosiatif menjadi array biasa untuk chart
        $incomeValues = array_values($incomeData);
        $expenseValues = array_values($expenseData);
        
        // Data untuk chart transaksi per dompet
        $transactionsByWallet = Transaction::join('wallets', 'transactions.wallet_id', '=', 'wallets.id')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->select('wallets.name as wallet_name', 'categories.type', DB::raw('SUM(transactions.amount) as total_amount'))
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
            'months', 
            'incomeValues', 
            'expenseValues',
            'walletData'
        ));
    }
}
