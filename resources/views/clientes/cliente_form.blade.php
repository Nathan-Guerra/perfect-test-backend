@extends('layout')

@section('script')
    <script defer src="{{ mix('js/cliente_form.js') }}"></script>
    
@endsection

@section('content')
    <h1>Adicionar / Editar Cliente</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="nome">Nome do cliente</label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}">
                    @error('nome')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf') }}" placeholder="999.999.999-99">
                    @error('cpf')
                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection
