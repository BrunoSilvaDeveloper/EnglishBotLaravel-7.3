<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frase;

class FrasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Frase::query();

        // Aplicar filtro se o parâmetro field_value estiver presente na requisição
        if ($request->filled('field_value')) {
            $query->where('nivel', $request->input('field_value'));
        }


        // Ordenar os resultados pelo campo 'nivel'
        $query->orderBy('nivel');

        // Obter frases paginadas
        $frases = $query->paginate(10);

        // Retornar a view com as frases e o valor do filtro
        return view('admin.pages.frases.index', compact('frases'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.frases.create', ['frase' => new Frase()] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nivelFrase = implode(",",array_keys(Frase::NIVEL_FRASE)); 

        $this->validate($request, [ // faz a validacao dos dados, caso passem, salva os dados, caso nao, retorna para a pagina de formularios 
            'frase' =>'required',
            'traducao' =>'required',
            'nivel' =>"required | in:$nivelFrase", // verifica se o valor esta na variavel. variavel== 1,2,3. O valor deve ser um deles
        ]);

        $data = $request->all();
        Frase::create($data);
        return redirect()->route('frases.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frase = Frase::findOrFail($id);  // envia os dados do id especifico para a pagina
        return view('admin.pages.frases.show', compact('frase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frase = Frase::findOrFail($id);  // envia os dados do id especifico para a pagina
        return view('admin.pages.frases.edit', compact('frase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Validação dos dados do formulário
         $nivelFrase = implode(",",array_keys(Frase::NIVEL_FRASE)); 

         $request->validate([
             'frase' => 'required|string',
             'traducao' => 'required|string',
             'nivel' => "required|in:$nivelFrase", // Validando se o nível está entre os valores permitidos
         ]);
 
         // Encontrar a frase pelo ID
         $frase = Frase::findOrFail($id);
 
         // Atualizar os dados da frase com base nos dados do formulário
         $frase->frase = $request->frase;
         $frase->traducao = $request->traducao;
         $frase->nivel = $request->nivel;
         $frase->save();
 
         // Redirecionar de volta para a lista de frases com uma mensagem de sucesso
         return redirect()->route('frases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frase = Frase::findOrFail($id);
        $frase->delete();

        // Redirecionar de volta para a lista de frases com uma mensagem de sucesso
        return redirect()->route('frases.index');
    }
}
