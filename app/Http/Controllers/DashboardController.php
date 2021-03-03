<?php

namespace App\Http\Controllers;

use App\Services\VendaService;
use App\Services\ClienteService;
use App\Services\ProdutoService;

class DashboardController extends Controller
{
    private $clienteService;
    private $produtoService;
    private $vendaService;

    public function __construct()
    {
        $this->clienteService = app(ClienteService::class);
        $this->produtoService = app(ProdutoService::class);
        $this->vendaService = app(VendaService::class);
    }

    public function index(string $successMessage = null)
    {
        $clientes = $this->clienteService->all();
        $produtos = $this->produtoService->all();
        $vendas = $this->vendaService->all();

        $totalVendidos = $this->vendaService->returnTotalAndQuantity($this->vendaService->vendidos());
        $totalCancelados = $this->vendaService->returnTotalAndQuantity($this->vendaService->cancelados());
        $totalDevolvidos = $this->vendaService->returnTotalAndQuantity($this->vendaService->devolvidos());

        return view('dashboard')->with(compact('clientes', 'produtos', 'vendas', 'totalVendidos', 'totalCancelados', 'totalDevolvidos'));
    }
}
