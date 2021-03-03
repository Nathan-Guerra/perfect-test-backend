<?php

namespace App\Services;

use DateTimeImmutable;
use App\Repositories\VendaRepository;
use Illuminate\Database\Eloquent\Collection;

class VendaService
{

    private $repository;

    public function __construct(VendaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): int
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function all(): Collection
    {
        return $this->repository->all();
    }

    public function vendidos(): Collection
    {
        return $this->repository->vendidos();
    }

    public function cancelados(): Collection
    {
        return $this->repository->cancelados();
    }

    public function devolvidos(): Collection
    {
        return $this->repository->devolvidos();
    }

    public function returnTotalAndQuantity(Collection $vendas): array
    {
        if (empty($vendas)) {
            return [0, 0];
        }

        $soma = $quantidade = 0;

        foreach ($vendas as $venda) {
            $desconto = $venda->preco * ($venda->desconto / 100);
            $soma += ($venda->quantidade * $venda->preco) - $desconto;
            $quantidade += $venda->quantidade;
        }

        return [$quantidade, 'R$ ' . number_format($soma, 2, ',', '.')];
    }

    public function filterCustomerAndDate(int $idCliente, string $datas): Collection
    {
        $datas = explode(' - ', $datas);
        $dataInicio = DateTimeImmutable::createFromFormat('d/m/Y', $datas[0]);
        $dataFim = DateTimeImmutable::createFromFormat('d/m/Y', $datas[1]);

        return $this->repository->filterCustomerAndDate($idCliente, $dataInicio, $dataFim);
    }
}
