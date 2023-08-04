<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = 'cart';
    use HasFactory;
    protected $fillable = [
        'product_quantity',
        'product_price',
        'product_id',
        'user_id',
    ];
    // Phương thức kiểm tra sản phẩm có trong giỏ hàng hay không
    public static function isProductInCart($user_id, $product_id)
    {
        return self::where('user_id', $user_id)
                   ->where('product_id', $product_id)
                   ->exists();
    }
    // Phương thức 
    public static function getTotalPrice($user_id)
    {
        $cartItems = self::where('user_id', $user_id)->get();
        $totalPrice = 0;

        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem->product_quantity * $cartItem->product->price;
        }

        return $totalPrice;
    }
    public function products() 
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function order(){
        return $this->hasMany(Order::class,'user_id');
    }
}