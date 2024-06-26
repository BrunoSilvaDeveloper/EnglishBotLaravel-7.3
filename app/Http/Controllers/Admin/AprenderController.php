<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aprender;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class AprenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aprender = Aprender::paginate(10);  // utilizado para fazer paginacao, limitando a 10 registros
        return view('admin.pages.aprender.index', compact('aprender')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.aprender.create', ['aprender' => new Aprender()]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:30',
            'descricao' => 'required|string|max:210',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rota' => 'required|string', // Validar se a rota é uma string
        ]);

        // Verificar se a rota existe
        if (! Route::has($request->rota)) {
            return back()->withErrors(['rota' => 'A rota especificada não existe.']);
        }

        // Processar o upload da imagem, se fornecida
        $imagePath = null;
        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('imagens', 'public');
        }

        // Criar o card com os dados validados
        $aprender = Aprender::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem' => $imagePath,
            'rota' => $request->rota,
        ]);

        // Redirecionar de volta para a lista de cards com uma mensagem de sucesso
        return redirect()->route('aprender.index')->with('success', 'Card de Aprender criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aprender = Aprender::findOrFail($id);  // envia os dados do id especifico para a pagina
        return view('admin.pages.aprender.edit', compact('aprender'));
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
        $request->validate([
            'titulo' => 'required|string|max:30',
            'descricao' => 'required|string|max:210',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rota' => 'required|string', // Validar se a rota é uma string
        ]);

        // Verificar se a rota existe
        if (! Route::has($request->rota)) {
            return back()->withErrors(['rota' => 'A rota especificada não existe.']);
        }

        // Encontrar o registro existente
        $aprender = Aprender::findOrFail($id);

        // Processar o upload da nova imagem, se fornecida
        if ($request->hasFile('imagem')) {
            $file = $request->file('imagem');
            if ($file->isValid()) {
                $imagePath = $file->store('imagens', 'public');
                // Remover a imagem antiga, se existir
                if ($aprender->imagem) {
                    Storage::disk('public')->delete($aprender->imagem);
                }
                $aprender->imagem = $imagePath;
            } else {
                return back()->withErrors(['imagem' => 'A imagem não é válida.']);
            }
        }

        // Atualizar os outros campos
        $aprender->titulo = $request->titulo;
        $aprender->descricao = $request->descricao;
        $aprender->rota = $request->rota;
        $aprender->save();

        // Redirecionar de volta para a lista de cards com uma mensagem de sucesso
        return redirect()->route('aprender.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Aprender = Aprender::findOrFail($id);
        $Aprender->delete();

        // Redirecionar de volta para a lista de Aprender com uma mensagem de sucesso
        return redirect()->route('aprender.index');
    }
}
