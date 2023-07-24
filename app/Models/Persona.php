<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    public function grupoAm()
    {
        return $this->belongsTo(GrupoAm::class, 'grupo_id');
    }
}
