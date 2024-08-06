<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Etudians;
class DemandeetudiantController extends Controller
{
    public function index(){
        $user = Auth::guard('etudient')->user();
       
        return view ('etudiant.views.demandetudiant',compact('user'));}
        public function indexx(){
            $user = Auth::guard('etudient')->user();
           

            return view ('etudiant.views.demandenotification');}

        public function enregistrerDemande(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
       //name
       'apogee' => 'required',
       
       'filiere' => 'required',
       'semestre' => 'required',
       'Numero' => 'required',
       'Email' => 'required|email',
       'Type' => 'required',
      
        ]);

        // Création d'une nouvelle réclamation
        $demande = new Demande();
        $demande->apogee = $request->apogee;
        
         $demande->filiere = $request->filiere;
         $demande->semestre = $request->semestre;
         $demande->Numero = $request->Numero;
         $demande->Email = $request->Email;
        $demande->Type = $request->Type;
       
        // Enregistrement de la réclamation dans la base de données
        $demande->save();

        return redirect()->route('demande')->with('success', 'Demande enregistrée avec succès.');
        
    }
  
    public function demandeEtudiants(Request $request)
    {
       
        $user = Auth::guard('etudient')->user();
        
       
        $demande = Demande::where('apogee', $user->apogee)->select([
            'Nom', 'Prenom','Numero','Email','Type'
        ]);
    
        return DataTables::of($demande)->make(true);
    }
    public function espace()
    {
        // Récupérer l'étudiant authentifié
        $etudiant = Auth::guard('etudient')->user();

        // Récupérer les demandes validées pour cet étudiant en chargeant les documents associés
        $demandes = Demande::where('apogee', $etudiant->apogee)
                                   ->where('status', 'validé')
                                   ->with('document')
                                   ->with('etudient') // Charger la relation document
                                   ->get();

        return view('etudiant.views.demandenotification', compact('demandes'));
    }
    

    public function store(Request $request)
    {
       
        // Valider les données entrantes
        $request->validate([
            'apogee' => 'required|exists:etudient,apogee',
            'id_filiere' => 'required',
           'id_document' => 'required|exists:document_admin,id_document',
        ]);

        // Créer une nouvelle demande
        Demande::create([
            'apogee' => $request->input('apogee'),
            'id_filiere' => $request->input('id_filiere'),
            'id_document' => $request->input('id_document'),
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Demande enregistrée avec succès.');
    }
}

