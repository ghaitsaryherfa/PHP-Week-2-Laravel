<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Shopping extends Model
{
    use HasFactory;

    protected $primaryKey = 'shopping_code';
    
    protected $fillable = [
        'shopping_title', 'shopping_description', 'shopping_category', 'shopping_date', 'total_shopping'
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Items::class, 'shopping_code', 'shopping_code');
    }
}
