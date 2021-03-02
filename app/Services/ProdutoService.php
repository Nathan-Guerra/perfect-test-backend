<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;

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

    public function update(array $data): bool
    {
        $id = $data['id'];
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
