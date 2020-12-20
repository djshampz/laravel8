<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'product_user')->withTimestamps();
    }
}
