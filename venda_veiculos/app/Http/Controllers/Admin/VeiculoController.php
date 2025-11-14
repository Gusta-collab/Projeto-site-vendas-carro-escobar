<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;  
use App\Models\Cor;
use Illuminate\Database\QueryException;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = \App\Models\Veiculo::with(['modelo.marca', 'cor'])->get();

        return view('admin.veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();

        return view('admin.veiculos.create', compact('marcas', 'modelos', 'cores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo_id' => 'required|integer|exists:modelos,id',
            'cor_id' => 'required|integer|exists:cors,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'detalhes' => 'nullable|string',
            'foto_1' => 'nullable|url',
            'foto_2' => 'nullable|url',
            'foto_3' => 'nullable|url',
        ], [

            'modelo_id.required' => 'O modelo é obrigatório.',
            'cor_id.required' => 'A cor é obrigatória.',
            'ano.required' => 'O ano é obrigatório.',
            'quilometragem.required' => 'A quilometragem é obrigatória.',
            'valor.required' => 'O valor é obrigatório.',
            'foto_1.url' => 'A Foto 1 deve ser um link (URL) válido.',
            'foto_2.url' => 'A Foto 2 deve ser um link (URL) válido.',
            'foto_3.url' => 'A Foto 3 deve ser um link (URL) válido.',
        ]);

        Veiculo::create($request->all());

        return redirect()->route('admin.veiculos.index')->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        $marcas = Marca::orderBy('nome')->get();
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();

        return view('admin.veiculos.edit', compact('veiculo', 'marcas', 'modelos', 'cores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'modelo_id' => 'required|integer|exists:modelos,id',
            'cor_id' => 'required|integer|exists:cors,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'quilometragem' => 'required|integer|min:0',
            'valor' => 'required|numeric|min:0',
            'detalhes' => 'nullable|string',
            'foto_1' => 'nullable|url',
            'foto_2' => 'nullable|url',
            'foto_3' => 'nullable|url',
        ], [
            'modelo_id.required' => 'O modelo é obrigatório.',
            'cor_id.required' => 'A cor é obrigatória.',
            'ano.required' => 'O ano é obrigatório.',
            'quilometragem.required' => 'A quilometragem é obrigatória.',
            'valor.required' => 'O valor é obrigatório.',
        ]);

        $veiculo->update($request->all());

        return redirect()->route('admin.veiculos.index')->with('sucesso', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return redirect()->route('admin.veiculos.index')->with('sucesso', 'Veículo excluído com sucesso!');
    }
}
