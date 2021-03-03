@extends('layout')

@section('script')
    <script defer src="{{ mix('js/dashboard.js') }}"></script>
@endsection

@section('content')
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href='{{ route('vendas.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
            <form action="{{ route('vendas.date-customer') }}" method="POST">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="cliente_busca" name="cliente_busca" required>
                                <option selected></option>

                                @if(!empty($clientes))
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 my-1">
                        <label class="sr-only" for="range_datas">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Período</div>
                            </div>
                            <input required type="text" class="form-control date_range" id="range_datas" name="range_datas" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Produto
                    </th>
                    <th scope="col">
                        Data
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                
                @if(Session::has('vendasFiltradas'))
                    @php
                        $vendas = Session::pull('vendasFiltradas');    
                    @endphp
                @endif

                @if(!empty($vendas))
                    @foreach($vendas as $venda)
                        <tr>
                            <td>
                                {{ $venda->nome_produto }}
                            </td>
                            <td>
                                {{ date_format(new DateTimeImmutable($venda->data_venda), 'd/m/Y') }}
                            </td>
                            <td>
                                {{ $venda->preco }}
                            </td>
                            <td>
                                <a href="{{ route('vendas.edit', ['venda' => $venda]) }}" class='btn btn-primary'>Editar</a>
                                <a data-token="{{ csrf_token() }}" href="{{ route('vendas.destroy', ['venda' => $venda]) }}" class='btn btn-danger btn-remove'>Remover</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Status
                    </th>
                    <th scope="col">
                        Quantidade
                    </th>
                    <th scope="col">
                        Valor Total
                    </th>
                </tr>
                <tr>
                    <td>
                        Vendidos
                    </td>
                    <td>
                        {{ $totalVendidos[0] }}
                    </td>
                    <td>
                        {{ $totalVendidos[1] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Cancelados
                    </td>
                    <td>
                        {{ $totalCancelados[0]}}
                    </td>
                    <td>
                        {{ $totalCancelados[1] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Devoluções
                    </td>
                    <td>
                        {{ $totalDevolvidos[0]}}
                    </td>
                    <td>
                        {{ $totalDevolvidos[1] }}
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href='{{ route('produtos.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Valor
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                @if(!empty($produtos))
                    @foreach($produtos as $produto)
                        <tr>
                            <td>
                                {{ $produto->nome }}
                            </td>
                            <td>
                                {{ 'R$ ' . number_format($produto->preco, 2, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('produtos.edit', ['produto' =>$produto]) }}" class='btn btn-primary'>Editar</a>
                                <a data-token="{{ csrf_token() }}" href="{{ route('produtos.destroy', ['produto' =>$produto]) }}" class='btn btn-danger btn-remove'>Remover</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Clientes
                <a href='{{ route('clientes.create') }}' class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo cliente</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        Nome
                    </th>
                    <th scope="col">
                        Email
                    </th>
                    <th scope="col">
                        CPF
                    </th>
                    <th scope="col">
                        Ações
                    </th>
                </tr>

                @if(!empty($clientes))
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>
                                {{ $cliente->nome }}
                            </td>
                            <td>
                                {{ $cliente->email }}
                            </td>
                            <td>
                                {{ $cliente->cpf }}
                            </td>
                            <td>
                                <a href="{{ route('clientes.edit', ['cliente' => $cliente]) }}" class='btn btn-primary'>Editar</a>
                                <a data-token="{{ csrf_token() }}" href="{{ route('clientes.destroy', ['cliente' => $cliente]) }}" class='btn btn-danger btn-remove'>Remover</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </table>
        </div>
    </div>
@endsection
