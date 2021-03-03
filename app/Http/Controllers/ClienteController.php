<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Services\ClienteService;
use App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
{
    private $service;

    public function __construct(ClienteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }


    public function create()
    {
        return view('clientes.cliente_form');
    }

    public function store(ClienteRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Cliente $cliente)
    {
        $url = route('clientes.update', $cliente);
        return view('clientes.cliente_form')->with(compact('cliente', 'url'));
    }
    
    public function edit(Cliente $cliente)
    {
        $url = route('clientes.update', $cliente);
        return view('clientes.cliente_form')->with(compact('cliente', 'url'));
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $this->service->update($cliente->id, $request->validated());
        return redirect()->route('dashboard');
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }
}
