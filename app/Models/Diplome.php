<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $table = 'diplome';
    protected $primaryKey = 'id_diplome';
    use HasFactory;
    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'diplome_etudiant', 'id_diplome', 'apogee')
                    ->withPivot('mention');
    }
}
