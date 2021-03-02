<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Venda extends Model
{
    protected $table = 'vendas';
    protected $fillable = [
        'id_cliente',
        'id_produto',
        'data_venda',
        'desconto',
        'quantidade',
        'status'
    ];

    public $timestamps = false;

    public function scopeVendidos(Builder $query)
    {
        return $query->where('status', 'v');
    }

    public function scopeCancelados(Builder $query)
    {
        return $query->where('status', 'c');
    }

    public function scopeDevolvidos(Builder $query)
    {
        return $query->where('status', 'd');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }
    
    public function produto() {
        return $this->belongsTo(Produto::class, 'id_produto', 'id');
    }

}
