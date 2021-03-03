<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
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
        return view('vendas.venda_form')->with(compact('clientes', 'produtos'));
    }

    public function store(VendaRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Venda $venda)
    {
        $url = route('vendas.update', $venda);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.venda_form')->with(compact('venda', 'url', 'clientes', 'produtos'));
    }
    
    public function edit(Venda $venda)
    {
        $url = route('vendas.update', $venda);
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('vendas.venda_form')->with(compact('venda', 'url', 'clientes', 'produtos'));
    }

    public function update(VendaRequest $request, Venda $venda)
    {
        $this->service->update($venda->id, $request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }

    public function filterCustomerAndDate(Request $request)
    {
        $vendasFiltradas = $this->service->filterCustomerAndDate($request['cliente_busca'], $request['range_datas']);
        $request->session()->put('vendasFiltradas', $vendasFiltradas);
        return redirect()->route('dashboard');
    }
}
