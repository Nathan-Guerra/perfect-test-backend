<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Services\ProdutoService;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    private $service;

    public function __construct(ProdutoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }


    public function create()
    {
        return view('produtos.produto_form');
    }

    public function store(ProdutoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Produto $produto)
    {
        $url = route('produtos.update', $produto);
        return view('produtos.produto_form')->with(compact('produto', 'url'));
    }
    
    public function edit(Produto $produto)
    {
        $url = route('produtos.update', $produto);
        return view('produtos.produto_form')->with(compact('produto', 'url'));
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        $this->service->update($produto->id, $request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }
}
