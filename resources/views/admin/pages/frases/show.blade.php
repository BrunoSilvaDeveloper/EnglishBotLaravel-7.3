<style>

    .container-main{
        width: 100%;
        height: 600px;
        max-width: 1220px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .container a{
        text-decoration: none;
        color: #111827;
    }
    /* Estilo básico da tabela */
    table {
        width: 600px;
        border-collapse: separate; /* Usar 'separate' para aplicar bordas arredondadas */
        border-spacing: 0; /* Remove espaçamento entre células */
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        margin: 30px 0;
        color: black;
        
    }

    th, td {
        text-align: left;
        padding: 20px 10px;
    }


    th{
        width: 100px;
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
    .btn-link{
        padding: 1px 5px;
        border-bottom: 1px solid #41D3BD;
        border-radius: 10px;
        margin: 3px;
    }
    .select{
        position: relative;
        left: 100%;
        transform: translateX(-130%);
    }

    .form1{
        background-color: #F3F4F6;
    }
    .form1:hover{
        background-color: #FFFFFF;
    }
    .form2{
        background-color: #FFFFFF;
    }
    .buttons{
        width: 600px;
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
    <div class="container">
        <header name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ver Frase') }}
            </h2>
        </header>

        
        <div class="container">
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th scope="row">Frase</th>
                    <td>{{$frase->frase}}</td>
                </tr>
                <tr>
                    <th scope="row">Tradução</th>
                    <td>{{$frase->traducao}}</td>
                </tr>
                <tr>
                    <th scope="row">Nível</th>
                    <td>{{\App\Models\Frase::NIVEL_FRASE[$frase->nivel] }}</td>
                </tr>
                </tbody>
            </table>
            <div class="buttons">
                <a class="btn-link" href="{{route('frases.edit',['frase' => $frase->id])}}">Editar</a>
                <a class="btn-link" href="{{ route('frases.destroy', $frase->id) }}"
                    onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete-{{ $frase->id }}').submit();}">Excluir</a>
                <form id="form-delete-{{ $frase->id }}" style="display: none" action="{{ route('frases.destroy', $frase->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
                <a class="btn-link" href="{{route('frases.index',['frase' => $frase->id])}}">Voltar</a>
            </div>
        </div>

    </div>

    @endsection
