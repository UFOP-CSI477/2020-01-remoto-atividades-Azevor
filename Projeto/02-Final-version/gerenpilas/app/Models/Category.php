<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'user_id'];

    // uma categoria pertence a uma transação
    public function user() {
        return $this->belongsTo(User::class);
    }

    // uma categoria tem muitas transações
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
