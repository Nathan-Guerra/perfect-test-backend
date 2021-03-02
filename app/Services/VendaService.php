<?php

namespace App\Services;

use App\Repositories\VendaRepository;

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
