<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'quantidade', 'um'];

    // 1 produto tem muitas compras
    public function compras() {
        return $this->hasMany(Compra::class);
    }
}
