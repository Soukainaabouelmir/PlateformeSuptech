<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $fillable = [
        'nom', 'prenom', 'cin_salarie', 'matricule_cnss', 'mail', 'etablissement',
        'RIB', 'RIB_pdf', 'type_contrat', 'contrat_pdf', 'cv_pdf', 'cin_pdf'
    ];
    public $timestamps = false;

   
}
