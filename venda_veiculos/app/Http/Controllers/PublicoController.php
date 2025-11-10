<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use App\Models\Modelo; 
use App\Models\Cor;    
use App\Models\Foto;   
use Illuminate\Http\Request;


class PublicoController extends Controller
{
    /**
     * Mostra a página inicial com a listagem de todos os veículos.
     */
    public function index()
    {
        $veiculos = Veiculo::with(['modelo.marca','cor'])->get();

        return view('publico.index', compact('veiculos'));
    }
    
    public function show($id)
    {
        $veiculo = \App\Models\Veiculo::with(['modelo.marca','cor'])->FindOrFail($id);

        return view('publico.show', compact('veiculo'));
    }
}