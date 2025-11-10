<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;
    
    // Essencial: Informa ao Laravel o nome correto da tabela
    protected $table = 'cors'; 

    // Relacionamento
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}