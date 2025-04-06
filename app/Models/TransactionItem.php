<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = [
        'users_id',
        'products_id',
        'transactions_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class,  'transactions_id', 'id');
    }
}
