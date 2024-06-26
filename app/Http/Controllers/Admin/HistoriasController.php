<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Historia;

class HistoriasController extends Controller
{
    public function index(Request $request)
    {
        $query = Historia::query();

        // Aplicar filtro se o parâmetro field_value estiver presente na requisição
        if ($request->filled('field_value')) {
            $query->where('nivel', $request->input('field_value'));
        }

        $query->orderBy('nivel');

        // Obter historias paginadas
        $historias = $query->paginate(10);

        // Retornar a view com as historias e o valor do filtro
        return view('admin.pages.historias.index', compact('historias'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.historias.create', ['historia' => new Historia()] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nivelHistoria = implode(",",array_keys(Historia::NIVEL_HISTORIA)); 

        $this->validate($request, [ // faz a validacao dos dados, caso passem, salva os dados, caso nao, retorna para a pagina de formularios 
            'historia' =>'required',
            'traducao' =>'required',
            'nivel' =>"required | in:$nivelHistoria", // verifica se o valor esta na variavel. variavel== 1,2,3. O valor deve ser um deles
        ]);

        $data = $request->all();
        Historia::create($data);
        return redirect()->route('historias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $historia = Historia::findOrFail($id);  // envia os dados do id especifico para a pagina
        return view('admin.pages.historias.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historia = Historia::findOrFail($id);  // envia os dados do id especifico para a pagina
        return view('admin.pages.historias.edit', compact('historia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nivelHistoria = implode(",",array_keys(Historia::NIVEL_HISTORIA));

        $request->validate([
            'historia' => 'required|string',
            'traducao' => 'required|string',
            'nivel' => "required|in:$nivelHistoria", // Validando se o nível está entre os valores permitidos
        ]);

        // Encontrar a frase pelo ID
        $historia = Historia::findOrFail($id);

        // Atualizar os dados da frase com base nos dados do formulário
        $historia->historia = $request->historia;
        $historia->traducao = $request->traducao;
        $historia->nivel = $request->nivel;
        $historia->save();

        // Redirecionar de volta para a lista de frases com uma mensagem de sucesso
        return redirect()->route('historias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $historia = Historia::findOrFail($id);
        $historia->delete();
        return redirect()->route('historias.index');
    }
}
