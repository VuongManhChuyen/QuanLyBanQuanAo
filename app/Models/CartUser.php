<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartUser extends Model
{
    public $table = 'cartuser';
    use HasFactory;
    protected $fillable = [
        'id_user',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}