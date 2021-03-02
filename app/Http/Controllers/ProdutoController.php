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
        return route('dashboard');
    }


    public function create()
    {
        $url = route('produtos.store');
        return view('produtos.produto_form')->with(compact('url'));
    }

    public function store(ProdutoRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Produto $produto)
    {
        $url = route('produtos.update', $produto->id);
        return view('produtos.produto_form')->with(compact('produto', 'url'));
    }

    public function edit(Produto $produto)
    {
        return view('produtos.show')->with('produto', $produto);
    }

    public function update(ProdutoRequest $request, Produto $produto)
    {
        dd($produto, $request);
        // return $this->service->update($produto);
        // return view('produtos.show')->with('produto', $produto);
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }
}
