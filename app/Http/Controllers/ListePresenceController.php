<?php

namespace App\Http\Controllers;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class ListePresenceController extends Controller
{
    
 

    

    


    public function getEtudiants(Request $request)
    {
        $cycle = $request->input('cycle');
        $filiere = $request->input('filiere');
        $matiere = $request->input('matiere');
        $groupe = $request->input('groupe');
       
        // Stockez les choix dans des variables de session
        $request->session()->put('cycle', $cycle);
        $request->session()->put('filiere', $filiere);
        $request->session()->put('matiere', $matiere);
        $request->session()->put('groupe', $groupe);
        
        // Initialisez un tableau pour stocker les conditions de recherche
        $conditions = [];
    
        // Si le cycle est sélectionné, ajoutez-le aux conditions de recherche
        if ($cycle) {
            $conditions[] = ['Cycle', $cycle];
        }
    
        // Si la filière est sélectionnée, ajoutez-la aux conditions de recherche
        if ($filiere) {
            $conditions[] = ['Filiere', $filiere];
        }
    
        // Si la matière est sélectionnée, ajoutez-la aux conditions de recherche
        if ($matiere) {
            $conditions[] = ['Matiere', $matiere];
        }
    
        // Si le groupe est sélectionné, ajoutez-le aux conditions de recherche
        if ($groupe) {
            $conditions[] = ['Groupe', $groupe];
        }
    
        // Effectuez la recherche en fonction des conditions sélectionnées
        $etudiants = Etudians::where($conditions)->get(['apogee','CNE','CNI','Nom','Prenom']);
        
        // Redirigez vers la deuxième vue avec les choix comme paramètres d'URL
        return view('Prof.views.listepresence', compact('etudiants'));
        
      
    
    }
    
    public function getEtudiantsData(Request $request)
    { 
         // Récupérez les valeurs choisies
    $cycle = $request->session()->get('cycle');
    $filiere = $request->session()->get('filiere');
    $matiere = $request->session()->get('matiere');
    $groupe = $request->session()->get('groupe');

    // Initialisez un tableau pour stocker les conditions de recherche
    $conditions = [];

    // Si le cycle est sélectionné, ajoutez-le aux conditions de recherche
    if ($cycle) {
        $conditions[] = ['Cycle', $cycle];
    }

    // Si la filière est sélectionnée, ajoutez-la aux conditions de recherche
    if ($filiere) {
        $conditions[] = ['Filiere', $filiere];
    }

    // Si la matière est sélectionnée, ajoutez-la aux conditions de recherche
    if ($matiere) {
        $conditions[] = ['Matiere', $matiere];
    }

    // Si le groupe est sélectionné, ajoutez-le aux conditions de recherche
    if ($groupe) {
        $conditions[] = ['Groupe', $groupe];
    }

    // Effectuez la recherche en fonction des conditions sélectionnées
    $etudiants = Etudians::where($conditions)->get(['apogee','CNE','CNI','Nom','Prenom']);
    
    // Formatez les données pour DataTables
    $formattedData = DataTables::of($etudiants)
        ->addIndexColumn()
        ->make(true);

    // Retournez les données formatées sous forme de réponse JSON pour DataTables
    return $formattedData;
    }
}