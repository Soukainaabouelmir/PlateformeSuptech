<?php
namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Etudians;

class PaiementetudiantController extends Controller
{
    public function index()
    {
        $user = Auth::guard('etudient')->user();
        $inscription = DB::table('inscriptions');
       
        return view('etudiant.views.paiementetudiant', compact('user', 'inscription'));
    }
   

    public function enregistrerPaiement(Request $request)
    {
        $request->validate([
           
            'montant' => 'required',
           
            'apogee' => 'required',
            'date_paiement' => 'required',
            'id_modepaiement' => 'required|exists:mode_paiement,id_modepaiement',
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
