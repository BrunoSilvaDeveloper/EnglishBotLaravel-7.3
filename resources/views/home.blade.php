@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Olá, sejam muito bem vindos!</p>
                    <br>
                    <p>Este site visa ajudar você a treinar e colocar em prática seus estudos de inglês.</p>
                    <br>
                    <p>Atenção: Somente a funcionalidade administrativa está atualmente disponível. Se você está lendo esta mensagem, está logado como administrador. Como administrador responsável, mantenha os conteúdos organizados e evite adicionar qualquer material eticamente inadequado, por favor!</p>
                    <br>
                    <p>para acessar os conteudos, basta navegar entre as abas!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
