<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    public $table = 'khuyenmai';
    use HasFactory;
    protected $fillable = [
        'price_khuyenmai',
    ];

    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}