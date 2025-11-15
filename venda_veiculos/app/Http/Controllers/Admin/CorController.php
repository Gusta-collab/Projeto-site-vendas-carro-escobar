<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cor;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cores = Cor::all();

        return view('admin.cores.index', compact('cores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:cors'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Esta cor já existe.'
        ]);

        Cor::create([
            'nome' => $request->nome
        ]);

        return redirect()->route('admin.cores.index')->with('sucesso', 'Cor cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cor $cor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cor $cor)
    {
        return view('admin.cores.edit', compact('cor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cor $cor)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:cors,nome,' . $cor->id
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.unique' => 'Esta cor já existe.'
        ]);

        $cor->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('admin.cores.index')->with('sucesso', 'Cor atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cor $cor)
    {
        try {

            $cor->delete();

            return redirect()->route('admin.cores.index')->with('sucesso', 'Cor excluída com sucesso!');

        } catch (QueryException $e) {
            

            if ($e->getCode() == "23000") { 

                return redirect()->route('admin.cores.index')->with('erro', 'Esta cor não pode ser excluída, pois está sendo usada por um ou mais veículos.');
            }
            
            return redirect()->route('admin.cores.index')->with('erro', 'Ocorreu um erro inesperado ao excluir a cor.');
        }
    }
}
