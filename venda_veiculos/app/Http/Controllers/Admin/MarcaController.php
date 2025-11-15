<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all();

        return view('admin.marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nome' => 'required|string|max:255|unique:marcas'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Esta marca já existe.'
        ]);

        Marca::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('admin.marcas.index')->with('sucesso', 'Marca cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:marcas,nome,' . $marca->id
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Esta marca já existe.'
        ]);

        $marca->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('admin.marcas.index')->with('sucesso', 'Marca atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marca $marca)
    {
    try 
    {
    // 1. Tenta apagar a marca
    $marca->delete();

    return redirect()->route('admin.marcas.index')->with('sucesso', 'Marca excluída com sucesso!');

    } catch (QueryException $e) {
                
        if ($e->getCode() == "23000") {
            
            return redirect()->route('admin.marcas.index')->with('erro', 'Esta marca não pode ser excluída, pois está sendo usada por um ou mais modelos.');
        }

        return redirect()->route('admin.marcas.index')->with('erro', 'Ocorreu um erro inesperado ao excluir a marca.');
    }
}
}