<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Assurer_Cours;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Personnel;
use App\Models\Salle;
use App\Models\Heure_Fin;
use App\Models\Heure_Debut;
class calendarcontroller extends Controller
{
    public function index()
{
    $filieres = Filiere::all();
    $elements = Element::all();
    $personnels = Personnel::all();
    $salles = Salle::all();
    $heure_fins = Heure_Fin::all();
    $heure_debuts = Heure_Debut::all();
    return view('scolarite.views.calendar',compact('elements', 'filieres','salles','heure_fins','heure_debuts'));
}
public function indexx()
{
    return view('scolarite.table');
}

public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_salle' => 'required|integer',
            'id_date' => 'required|integer',
            'id_heure_debut' => 'required|integer',
            'id_heure_fin' => 'required|integer',
            
            'id_prof' => 'required|integer',
            'N_groupe' => 'nullable|integer',
            'id_element' => 'nullable|integer'
        ]);

        $assurerCours = Assurer_Cours::create($validatedData);

        return response()->json(['success' => 'Data saved successfully']);
    }

}
