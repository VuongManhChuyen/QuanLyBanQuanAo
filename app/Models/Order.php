<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'order';
    use HasFactory;
    protected $fillable=[
        'name_kh',
        'diachi',
        'phone',
        'email',
        'note',
        'id_user',
    ];
    public function users(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function cart(){
        return $this->hasMany(Order::class,'id_user');
    }
}