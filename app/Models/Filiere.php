<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{ protected $table = 'filiere';

    public $incrementing = false;

    public $timestamps = false;
    protected $fillable = [
       
       
        'id_filiere',
        'intitule',
        'description',
        'nombre_annee',
        'cycle',
        'cin_coordinateur',
          
           
       ];
    public function groupe()
    {
        return $this->hasMany(Groupe::class, 'id_filiere');
    }

    public function inscription()
    {
        return $this->hasMany(Inscription::class, 'id_filiere', 'id_filiere');
    }
    public function students()
    {
        return $this->hasManyThrough(Etudians::class, Inscription::class, 'id_filiere', 'apogee', 'id_filiere', 'apogee');
    }
    
}