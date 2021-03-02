<?php

namespace App\Repositories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProdutoRepository
{

    private $model;

    public function __construct(Produto $model)
    {
        $this->model = $model;
    }

    public function create(array $data): int 
    {
        try {
            $produto = $this->model->create($data);
            return $produto->id;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function update(int $id, array $data): bool
    {
        try {
            $produto = $this->model->findOrFail($id);
            $produto->fill($data);
            $produto->save();
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
