<?php

namespace App\Repositories;

use App\Models\Venda;
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
}
