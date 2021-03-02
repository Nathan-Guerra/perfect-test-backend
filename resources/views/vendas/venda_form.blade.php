@extends('layout')

@section('script')
    <script defer src="{{ mix('js/venda_form.js') }}"></script>   
    <script defer src="{{ url('js/robots.js') }}"></script>   
@endsection

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('vendas.store') }}" method="POST">
                @csrf
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="id_cliente">Cliente</label>
                    <select id="id_cliente" name="id_cliente" class="form-control @error('id_cliente') is-invalid @enderror">
                        <option selected>Escolha...</option>
                        @if(!empty($clientes))
                            @foreach($clientes as $cliente) {
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('id_cliente')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="id_produto">Produto</label>
                    <select id="id_produto" name="id_produto" class="form-control @error('id_produto') is-invalid @enderror">
                        <option selected>Escolha...</option>
                        @if(!empty($produtos))
                            @foreach($produtos as $produto) {
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('id_produto')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group flex">
                    <label for="data_venda">Data da Venda</label>
                    <div class="d-flex flex-row">
                        <input type="date"
                            class="form-control @error('data_venda') is-invalid @enderror" 
                            id="data_venda" 
                            name="data_venda" 
                            value="{{ old('data_venda') }}">
                    </div>
                    @error('data_venda')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" 
                        class="form-control @error('quantidade') is-invalid @enderror"
                        step="1"
                        max="10"
                        min="1"
                        id="quantidade"
                        name="quantidade" 
                        placeholder="1 a 10"
                        value="{{ old('quantidade') }}">
                    @error('quantidade')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="desconto">Desconto</label>
                    <input type="text" 
                        class="form-control @error('desconto') is-invalid @enderror"
                        id="desconto"
                        name="desconto" 
                        placeholder="100,00 ou menor"
                        value="{{ old('desconto') }}">
                    @error('desconto')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value='v' selected>Aprovado</option>
                        <option value='c'>Cancelado</option>
                        <option value='d'>Devolvido</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
