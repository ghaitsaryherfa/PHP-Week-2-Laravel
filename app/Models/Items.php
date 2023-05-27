<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Items extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_code';

    protected $fillable = [
        'item_name', 'item_description', 'item_category', 'item_qty', 'price', 'total_price', 'shopping_category'
    ];

    public function shopping(): HasOne
    {
        return $this->hasOne(Shopping::class, 'shopping_code', 'shopping_code');
    }
}
