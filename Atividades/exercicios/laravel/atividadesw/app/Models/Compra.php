<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['data_compra', 'pessoa_id', 'produto_id'];

    // compra pertence a um cliente
    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }

    // compra pertence a um produto
    public function produto() {
        return $this->belongsTo(Produto::class);
    }
}
