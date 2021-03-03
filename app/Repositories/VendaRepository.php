<?php

namespace App\Repositories;

use App\Models\Venda;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VendaRepository
{

    private $model;

    public function __construct(Venda $model)
    {
        $this->model = $model;
    }

    public function create(array $data): int
    {
        try {
            $venda = $this->model->create($data);
            return $venda->id;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $venda = $this->model->findOrFail($id);
            $venda->fill($data);
            $venda->save();
            return true;
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->model->destroy($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function all(): Collection
    {
        return $this->returnAllWithJoin($this->model);
    }

    public function vendidos(): Collection
    {
        return $this->returnAllWithJoin($this->model->vendidos());
    }

    public function cancelados(): Collection
    {
        return $this->returnAllWithJoin($this->model->cancelados());
    }

    public function devolvidos(): Collection
    {
        return $this->returnAllWithJoin($this->model->devolvidos());
    }

    public function returnAllWithJoin($model): Collection
    {
        return $model
            ->leftjoin('produtos', 'produtos.id', '=', 'vendas.id_produto')
            ->leftjoin('clientes', 'clientes.id', '=', 'vendas.id_cliente')
            ->get([
                'vendas.id',
                'vendas.id_produto',
                'vendas.id_cliente',
                'vendas.data_venda',
                'vendas.desconto',
                'vendas.quantidade',
                'vendas.status',
                'produtos.nome as nome_produto',
                'produtos.descricao',
                'produtos.preco',
                'clientes.nome as nome_cliente',
            ]);
    }

    public function filterCustomerAndDate(int $idCliente, DateTimeInterface $dataInicio, DateTimeInterface $dataFim): Collection
    {
        return $this->returnAllWithJoin($this->model->cliente($idCliente)->entreDatas($dataInicio, $dataFim));
    }
}
