<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'price', 'bedrooms', 'bathrooms','category_id', 'area', 'user_id', 'number',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}


