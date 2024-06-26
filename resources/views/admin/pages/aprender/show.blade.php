@extends('layouts.app')
@section('content')
    <div class="container">
        <header name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Usuarios') }}
            </h2>
        </header>

        <h3>Ver frase</h3>
        <a class="btn btn-default" href="{{route('frases.edit',['frase' => $frase->id])}}">Editar</a>
        <a class="btn btn-default" href="{{ route('frases.destroy', $frase->id) }}"
            onclick="event.preventDefault();if(confirm('Deseja excluir este item?')){document.getElementById('form-delete-{{ $frase->id }}').submit();}">Excluir</a>
        <form id="form-delete-{{ $frase->id }}" style="display: none" action="{{ route('frases.destroy', $frase->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
        </form>
        <a class="btn btn-default" href="{{route('frases.index',['frase' => $frase->id])}}">Voltar</a>
        <br/><br/>
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
    
    </div>

@endsection
