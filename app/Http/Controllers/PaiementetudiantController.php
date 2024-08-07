<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Filiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Etudians;

class PaiementetudiantController extends Controller
{
    public function index()
{
    $user = Auth::guard('etudient')->user();

   
    $inscription = DB::table('inscriptions')->where('apogee', $user->apogee)->first();

    
    $paidMonths = Paiement::where('apogee', $user->apogee)->pluck('mois_concerne')->toArray();

    
    $filiere = Filiere::where('id_filiere', $inscription->id_filiere)->first();

    
    $totalPaiements = Paiement::where('apogee', $user->apogee)->sum('montant');

    
    $resteAPayer = $filiere->cout_filiere - $totalPaiements;

    return view('etudiant.views.paiementetudiant', compact('user', 'inscription', 'paidMonths', 'filiere', 'resteAPayer'));
}

   
   
    public function enregistrerPaiement(Request $request)
    {
        $request->validate([
           
            'montant' => 'required',
           
            'apogee' => 'required',
            'date_paiement' => 'required',
            'id_modepaiement' => 'required|exists:mode_paiement,id_modepaiement',
            'id_filiere' => 'required|exists:filiere,id_filiere',
            'id_typepaiement' => 'required|exists:type_paiement,id_typepaiement',
            'mois_concerne' => 'required|array',
           'image' => 'nullable|image',
           
            
        ]);

        // Création d'un nouveau paiement
        foreach ($request->mois_concerne as $mois) {
            $paiement = new Paiement();
            
            $paiement->apogee = $request->apogee;
           
            $paiement->montant = $request->montant;
            $paiement->date_paiement = $request->date_paiement;
            $paiement->id_typepaiement = $request->id_typepaiement;
            $paiement->id_filiere = $request->id_filiere;
            $paiement->id_modepaiement = $request->id_modepaiement;
           
            $paiement->mois_concerne = $mois;
            

            // Gérer l'image
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('asset/images'), $imageName); 
                $paiement->image = $imageName; 
            }

            $paiement->save();
        }

        return redirect()->route('paiement')->with('success', 'Votre paiement a été enregistré avec succès.');
    }

    public function getPaidMonths(Request $request)
    {
        $user = Auth::guard('etudient')->user();
        $paidMonths = Paiement::where('apogee', $user->apogee)->pluck('mois_concerne');

        return response()->json(['paidMonths' => $paidMonths]);
    }
    
    public function paiementEtudiantshistorique(Request $request)
    {
       
        $user = Auth::guard('etudient')->user();
        
       
        $paiement = Paiement::where('apogee', $user->apogee)->select([
           'date_paiement','nom', 'prenom','n_telephone','Email','cni','montant','mois_concerne','mode_paiement','choix'
        ]);
    
        return DataTables::of($paiement)->make(true);
    }
    
}
