<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];
    
    /**
     * Get the transactions for the category.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
