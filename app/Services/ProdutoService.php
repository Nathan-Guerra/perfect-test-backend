<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;
use Illuminate\Database\Eloquent\Collection;

class ProdutoService
{

    private $repository;

    public function __construct(ProdutoRepository $repository)
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
}
