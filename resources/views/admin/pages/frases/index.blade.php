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
    }
    .container a{
        text-decoration: none;
        color: #111827;
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
        text-align: left;
        max-height: 50px;
        max-width: 220px;
        overflow: hidden; 
        white-space: nowrap;
        text-overflow: ellipsis;
        padding: 12px 10px;
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

    td:nth-child(1) {
        width: 5%;
    }
    td:nth-child(2) {
        width: 35%;
    }
    td:nth-child(3) {
        width: 35%;
    }
    td:nth-child(4) {
        width: 5%;
        text-align: center;
    }
    td:nth-child(5) {
        width: 15%;
        text-align: center;
    }

    th:nth-child(4) {
        width: 5%;
        text-align: center;
    }
    th:nth-child(5) {
        width: 15%;
        text-align: center;
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
            {{ __('Frases') }}
        </h2>
    </header>

    <div class="container">
        <a class="btn-link" href="{{ route('frases.create') }}" style="position:relative; top: 20px;">Criar nova</a>

        <div class="container-filtro">
            <form action="{{ route('frases.index') }}" method="GET" id="filterForm">
                <select name="field_value" id="filter" onchange="document.getElementById('filterForm').submit()" class="btn btn-default" style="position:relative; top: -13px; left: 110px; padding:7px;">
                    <option value="">Todos </option>
                    <option value="1" {{ request('field_value') == '1' ? 'selected' : '' }}>Básico</option>
                    <option value="2" {{ request('field_value') == '2' ? 'selected' : '' }}>Básico Avançado</option>
                    <option value="3" {{ request('field_value') == '3' ? 'selected' : '' }}>Intermediário</option>
                    <option value="4" {{ request('field_value') == '4' ? 'selected' : '' }}>Intermediário Avançado</option>
                    <option value="5" {{ request('field_value') == '5' ? 'selected' : '' }}>Fluente</option>
                </select>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Frase</th>
                    <th>Tradução</th>
                    <th>Nível</th>
                    <th class="vinte">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($frases as $frase)
                <tr>
                    <td>{{$frase->id}}</td>
                    <td>{{$frase->frase}}</td>
                    <td>{{$frase->traducao}}</td>
                    <td>{{\App\Models\Frase::NIVEL_FRASE[$frase->nivel] }}</td>
                    <td class="vinte">            
                        <a class="btn-link" href="{{route('frases.show',['frase' => $frase->id])}}">Ver</a>
                        <a class="btn-link" href="{{route('frases.edit',['frase' => $frase->id])}}">Editar</a>
                        <a class="btn-link" href="{{ route('frases.destroy', $frase->id) }}"
                            onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete-{{ $frase->id }}').submit();}">Excluir</a>
                        <form id="form-delete-{{ $frase->id }}" style="display: none" action="{{ route('frases.destroy', $frase->id) }}" method="post" class="form">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $frases->appends(['field_value' => request('field_value')])->links() }}
    </div>

@endsection

