<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cidade_id'];

    // pessoa pertence a uma cidade
    public function cidade() {
        return $this->belongsTo(Cidade::class);
    }

    // 1 pessoa tem muitas compras
    public function compras() {
        return $this->hasMany(Compra::class);
    }
}
