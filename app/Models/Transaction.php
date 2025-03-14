<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'category_id',
        'wallet_id',
        'amount',
        'date'
    ];
    
    /**
     * Get the category that owns the transaction.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    /**
     * Get the wallet that owns the transaction.
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
