<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteRepository
{

    private $model;

    public function __construct(Cliente $model)
    {
        $this->model = $model;
    }

    public function create(array $data): int
    {
        try {
            $cliente = $this->model->create($data);
            return $cliente->id;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $cliente = $this->model->findOrFail($id);
            $cliente->fill($data);
            $cliente->save();
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
        return $this->model->all();
    }
}
