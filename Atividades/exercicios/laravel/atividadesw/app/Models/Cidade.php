<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado_id'];

    // cidade pertence a um estado
    public function estado() {
        return $this->belongsTo(Estado::class);
    }
    // 1 cidade tem muitas pessoas
    public function pessoas() {
        return $this->hasMany(Pessoa::class);
    }
}
