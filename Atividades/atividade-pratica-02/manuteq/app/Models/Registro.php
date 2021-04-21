<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'datalimite', 'tipo', 'user_id', 'equipamento_id'];

    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
