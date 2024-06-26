<style>

header{
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
}
.container{
    width: 100%;
    max-width: 1220px;
    margin: 0 auto;
    padding: 30px 0;
}
.container a{
        text-decoration: none;
        color: #111827;
    }
/* Estilo básico da tabela */

.btn{
    padding: 7px;
    background-color: #111827;
    margin: 0;
    border-radius: 10px;
    color: white;
    font-size: 14px;
    cursor: pointer;
}


.container-aprender{
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
    gap: 40px;
    margin-top: 30px;
}


.card{
    width: 340px;
    height: 460px !important;
    background-color: white;
    border-radius: 20px;
    border: 1px solid rgba(224, 224, 224, 0.35);
    box-shadow: 1px 2px 5px #8888885d;
    transition: all 0.2s ease-in-out;
}
.card:hover{
    box-shadow: 2px 4px 10px #888888;
}
.img-aprender{
    width: 340px;
    height: 200px;
    background-color: white;
    border-radius: 8px 8px 0 0;
    transform: translateX(-1px);
}
.img-aprender img{
    width: 100%;
    height: 100%;
    border-radius: 20px 20px 0 0;
    transform: translateY(-1px);

}
.info{
    width: 340px;
    height: 160px;
    padding: 16px;
}

.title{
    width: 308px;
    height: 28px;
}
.title h2 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
}
.description{
    width: 308px;
    height: 148px;
    margin-top: 8px;
    padding-top: 10px;
    font-size: 17px;
}
.description p {
    margin: 0;
    font-size: 17px;
}
.btn-link{
    padding: 5px 5px;
    border-bottom: 1px solid #41D3BD;
    border-radius: 10px;
    margin: 3px;
}

.pagination a{
        text-decoration: none;
        color: black;
}
.h-5{
    width: 20px !important;
}
.flex-1{
    display: none;
}

</style>

@extends('layouts.app')
@section('content')
    <header name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Aprender') }}
        </h2>
    </header>

    <div class="container">
        <a class="btn-link" href="{{ route('aprender.create') }}">Adicionar Seção</a>
        <div class="container-aprender">
        @foreach ($aprender as $card)
            <div class="card">
                <div class="img-aprender">
                @if ($card->imagem)
                    <img src="{{ asset('storage/' . $card->imagem) }}" alt="{{ $card->titulo }}">
                @endif
                </div>
                <div class="info">
                    <div class="title"><h2>{{ $card->titulo }}</h2></div>
                    <div class="description"><p>{{ $card->descricao }}</p></div>
                    
                    <div class="container-actions-aprender">
                        <a class="btn-link" href="{{ route('aprender.edit', $card->id) }}">Editar</a>
                        <a class="btn-link" href=""
                            onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete-{{ $card->id }}').submit();}">Excluir</a>
                        <form id="form-delete-{{ $card->id }}" style="display: none" action="{{ route('aprender.destroy', $card->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
                
            </div>
        @endforeach
        

        </div>

        {{ $aprender->links() }}
    </div>

@endsection
