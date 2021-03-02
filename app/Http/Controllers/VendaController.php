<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Services\VendaService;
use App\Http\Requests\VendaRequest;

class VendaController extends Controller
{
    private $service;

    public function __construct(VendaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }


    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        $url = route('vendas.store');
        return view('vendas.venda_form')->with(compact('url', 'clientes', 'produtos'));
    }

    public function store(VendaRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Venda $venda)
    {
        $url = route('vendas.update', $venda->id);
        return view('vendas.venda_form')->with(compact('venda', 'url'));
    }

    public function edit(Venda $venda)
    {
        return view('vendas.show')->with('venda', $venda);
    }

    public function update(VendaRequest $request, Venda $venda)
    {
        dd($venda, $request);
        // return $this->service->update($venda);
        // return view('vendas.show')->with('venda', $venda);
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }
}
