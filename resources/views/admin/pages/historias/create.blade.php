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
        max-height: 50px;
        max-width: 200px;
        overflow: hidden; 
        white-space: nowrap;
        text-overflow: ellipsis;
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
        padding: 8px 5px;
        border-bottom: 1px solid #41D3BD;
        border-radius: 10px;
        margin: 3px;
        background-color: white;
    }
    .btn-create{
        border: none;
        padding: 0px 5px;
        border-bottom: 1px solid #41D3BD;
        border-radius: 10px;
        margin: 3px;
        background-color: #F8FAFC;
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

</style>

@extends('layouts.app')
@section('content')
    <div class="container">
        <header name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Criar História') }}
            </h2>
        </header>

        <div class="container">
            @include('admin.pages.historias.form._errors')

            <form method="post" action="{{ route('historias.store') }}">
                @include('admin.pages.historias._form')
                <button type="submit" class="btn-create" style="background: white; padding: 6px;">Enviar</button>
                <a href="{{route('historias.index')}}" class="btn-link">Voltar</a>
            </form>
        </div>
    </div>
    


    @endsection
