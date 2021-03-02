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
        return route('dashboard');
    }


    public function create()
    {
        $url = route('clientes.store');
        return view('clientes.cliente_form')->with(compact('url'));
    }

    public function store(ClienteRequest $request)
    {
        $this->service->create($request->validated());
        return redirect()->route('dashboard');
    }

    public function show(Cliente $cliente)
    {
        $url = route('clientes.update', $cliente->id);
        return view('clientes.cliente_form')->with(compact('cliente', 'url'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.show')->with('cliente', $cliente);
    }

    public function update(ClienteRequest $request, Cliente $cliente)
    {
        dd($cliente, $request);
        // return $this->service->update($cliente);
        // return view('clientes.show')->with('cliente', $cliente);
    }

    public function destroy(int $id)
    {
        return $this->service->delete($id);
    }
}
