<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'area_id',
        'genre_id',
        'shop',
        'detail',
        'img'
    ];

    // booksテーブルとのリレーションを構築
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // likesテーブルとのリレーションを構築
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // areasテーブルとのリレーションを構築
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

     // genresテーブルとのリレーションを構築
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

     // reviewsテーブルとのリレーションを構築
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // averagesテーブルとのリレーションを構築
    public function average()
    {
        return $this->hasOne(Average::class);
    }

}
