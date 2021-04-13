<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'data', 'tipo', 'user_id', 'category_id'];

    // uma transação tem um usuário
    public function user() {
        return $this->belongsTo(User::class);
    }

    // uma transação tem uma categoria
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
