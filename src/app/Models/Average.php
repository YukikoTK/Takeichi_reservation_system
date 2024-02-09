<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Average extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'average',
    ];

    // shopsテーブルとのリレーションを構築
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
