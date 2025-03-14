<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    /**
     * Get the transactions for the wallet.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
