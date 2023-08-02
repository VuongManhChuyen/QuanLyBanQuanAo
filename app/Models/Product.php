<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    use HasFactory;
    protected $fillable = [
        'name_product',
        'img',
        'description',
        'price',
        'soluong',
        'category_id',
        'khuyenmai_id',
    ];
    public function category() //tạo relationship với model Category
    {
        return $this->belongsTo(Category::class);
    }
    public function khuyenmai() //tạo relationship với model Category
    {
        return $this->belongsTo(Khuyenmai::class);
    }
    public function cart() 
    {
        return $this->belongsTo(Cart::class,'id');
    }
    public function scopeByGender($query, $gender) 
    {
        return $query->where('gender', $gender);
    }
    
    
}