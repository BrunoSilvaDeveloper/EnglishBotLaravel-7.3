
<style>

    .container-main{
        width: 100%;
        max-width: 1220px;
        margin: 0 auto;
    }
    .container{
        width: 100%;
        max-width: 1220px;
        margin: 0 auto;
    }
    header h2{
        margin: 0 15px;
    }
    /* Estilo básico da tabela */
    table {
        width: 100%;
        border-collapse: separate; /* Usar 'separate' para aplicar bordas arredondadas */
        border-spacing: 0; /* Remove espaçamento entre células */
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        margin: 30px 0;
        color: black;
        
    }

    th, td {
        padding: 10px;
        text-align: left;
        
    }

    /* Cor de fundo para o cabeçalho */
    thead tr {
        background-color: #E1E1E3;
    }

    /* Linhas alternadas */
    tbody tr:nth-child(odd) {
        background-color: #F3F4F6;
    }

    tbody tr:nth-child(even) {
        background-color: white;
    }

    /* Estilo adicional (opcional) */
    tbody tr:hover {
        background-color: #d1d1d1;
    }

    .btn{
        padding: 7px;
        background-color: #111827;
        margin: 0;
        border-radius: 10px;
        color: white;
        font-size: 14px;
        cursor: pointer;
    }
    .form{
        margin: 0;
        padding: 0;
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
    <div class="container-main">
        <header name="header">
            <h2 class="header-nav">
                {{ __('Usuários') }}
            </h2>
        </header>

        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Frase</th>
                        <th>Tradução</th>
                        <th>Nível</th>
                        <th>Number</th>
                        <th>Ultimo Comando</th>
                        <th>Frases ou Aprender</th>
                        <th>Letra</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->frase}}</td>
                        <td>{{$usuario->traducao}}</td>
                        <td>{{$usuario->nivel}}</td>
                        <td>{{$usuario->number}}</td>
                        <td>{{$usuario->ultimo_comando}}</td>
                        <td>{{$usuario->frases_aprender}}</td>
                        <td>{{$usuario->letra}}</td>
                        <td>
                            <form action="{{route('usuarios.destroy', ['usuario' => $usuario->id])}}" method="post" style="display: inline-block;" class="form"> 
                                {!! csrf_field() !!} 
                                <input type="hidden" name="_method" value="DELETE"> 
                                <input type="submit" value="Deletar" class="btn btn-default btn-xs">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">{{ $usuarios->links() }}</div>
        </div>
    </div>

@endsection