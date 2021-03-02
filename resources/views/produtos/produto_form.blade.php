@extends('layout')

@section('script')
    <script defer src="{{ mix('js/produto_form.js') }}"></script>   
@endsection

@section('content')
    <h1>Adicionar / Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf
                <h5>Informações do produto</h5>
                <div class="form-group">
                    <label for="nome">Nome do produto</label>
                    <input type="text" required class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}">
                    @error('nome')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea 
                        type="text" 
                        required
                        rows='5' 
                        class="form-control @error('descricao') is-invalid @enderror" 
                        id="descricao" 
                        name="descricao">{{ old('descricao') }}</textarea>
                    @error('descricao')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" required class="form-control @error('preco') is-invalid @enderror" id="preco" name="preco" value="{{ old('preco') }}" placeholder="100,00 ou maior">
                    @error('preco')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
