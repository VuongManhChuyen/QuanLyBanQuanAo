<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'category';
    use HasFactory;

    protected  $fillable = [
        'name_category',
    ];
    // public function scopeByGender($query, $gender) 
    // {
    //     return $query->where('gender', $gender);
    // }
    public function products() 
    {
        return $this->hasMany(Product::class);
    }
}