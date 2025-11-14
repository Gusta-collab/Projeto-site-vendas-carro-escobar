<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modelo;
use Illuminate\Http\Request;
use App\Models\Marca;
use Illuminate\Database\QueryException;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = \App\Models\Modelo::with('marca')->get();
        
        return view('admin.modelos.index', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::orderBy('nome')->get();

        return view('admin.modelos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:modelos',
            'marca_id' => 'required|integer|exists:marcas,id'
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'nome.unique' => 'Este modelo já existe.',
            'marca_id.required' => 'Você precisa selecionar uma marca.'
        ]);

        Modelo::create([
            'nome' => $request->nome,
            'marca_id' => $request->marca_id
        ]);

        return redirect()->route('admin.modelos.index')->with('sucesso', 'Modelo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modelo $modelo)
    {
        $marcas = Marca::orderBy('nome')->get();

        return view('admin.modelos.edit', compact('modelo', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:modelos,nome,' . $modelo->id,
            'marca_id' => 'required|integer|exists:marcas,id'
        ], [
            'nome.required' => 'O nome do modelo é obrigatório.',
            'nome.unique' => 'Este modelo já existe.',
            'marca_id.required' => 'Você precisa selecionar uma marca.'
        ]);

        $modelo->update([
            'nome' => $request->nome,
            'marca_id' => $request->marca_id
        ]);

        return redirect()->route('admin.modelos.index')->with('sucesso', 'Modelo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
    try {
            // Tenta apagar o modelo
            $modelo->delete();

            // Se conseguir, retorna com sucesso
            return redirect()->route('admin.modelos.index')->with('sucesso', 'Modelo excluído com sucesso!');

        } catch (QueryException $e) {
            
            // Se o try falhar (código 23000 = violação de chave estrangeira)
            if ($e->getCode() == "23000") { 
                return redirect()->route('admin.modelos.index')->with('erro', 'Este modelo não pode ser excluído, pois está sendo usado por um ou mais veículos.');
            }

            // Se for qualquer outro erro
            return redirect()->route('admin.modelos.index')->with('erro', 'Ocorreu um erro inesperado ao excluir o modelo.');
        }
    }
}