<?php

namespace App\Models;

use DateTimeInterface;
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

    public function scopeEntreDatas(Builder $query, DateTimeInterface $dataInicio, DateTimeInterface $dataFim){
        return $query
            ->where('data_venda', '>=', $dataInicio)
            ->where('data_venda', '<=', $dataFim);
    }

    public function scopeCliente(Builder $query, int $idCliente) {
        return $query->where('id_cliente', $idCliente);
    }
}
