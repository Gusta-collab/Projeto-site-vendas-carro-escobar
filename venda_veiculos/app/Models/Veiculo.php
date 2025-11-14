<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id',
        'cor_id',
        'ano',
        'quilometragem',
        'valor',
        'detalhes',
        'foto_1',
        'foto_2',
        'foto_3',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class,'cor_id');
    }
}