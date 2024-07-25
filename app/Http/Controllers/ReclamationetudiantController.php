<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ReclamationetudiantController extends Controller
{
    public function index()
    {
   
    $user = Auth::guard('etudient')->user();
    $inscription = DB::table('inscriptions')
    ->where('inscriptions.apogee', $user->apogee)
    ->first();
  
    return view('etudiant.views.reclamationetudiant', compact('user', 'inscription'));
}



   
public function enregistrerReclamation(Request $request)
{
    // Validation des données du formulaire
    $request->validate([
        'apogee' => 'required|integer',
        
        'type_reclamation' => 'required|string',
        'description' => 'required|string',
        'file_reclamation' => 'required|file',
    ]);

    // Vérifiez les valeurs reçues
    
    // Création d'une nouvelle réclamation
    $reclamation = new Reclamation();
    $reclamation->apogee = $request->apogee;
   
    
    $reclamation->type_reclamation = $request->type_reclamation;
    $reclamation->description = $request->description;

    // Enregistrement de la réclamation dans la base de données
    if ($request->hasFile('file_reclamation')) {
        $file = $request->file('file_reclamation');
        $fileName = $file->getClientOriginalName(); // Obtenez le nom du fichier
        $file->move(public_path('asset/images'), $fileName); // Déplacez le fichier vers le dossier de destination
        $reclamation->file_reclamation = $fileName; // Stockez le nom du fichier dans la base de données
    }

    $reclamation->save();

    return redirect()->route('reclamation')->with('success', 'Réclamation enregistrée avec succès.');
}

}