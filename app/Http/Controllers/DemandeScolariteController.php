<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Etudians;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class DemandeScolariteController extends Controller
{
    public function index()
    {
        $demande = Demande::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.demandescolarite', compact('demande'));
    }
//-----------------------------------------------------------------------------//
    public function demandeEtudiants()
    {
        $demande = Demande::with('etudient')->select(['apogee', 'id', 'filiere', 'semestre', 'Numero', 'Email', 'Type']);
    
        return DataTables::of($demande)
            ->addIndexColumn()
            ->addColumn('Nom', function($demande) {
                return $demande->etudient ? $demande->etudient->Nom : '';
            })
            ->addColumn('Prenom', function($demande) {
                return $demande->etudient ? $demande->etudient->Prenom : '';
            })
            ->addColumn('actions', function($demande) {
                $disabled = $demande->archive ? 'disabled' : '';
                return '<div style="display: flex; gap: 5px;">
                           <form id="validate-form-' . $demande->apogee . '" action="' . route('demandes.valider', $demande->apogee) . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmValidation(' . $demande->apogee . ')" style="width:auto; background-color:green; color:#fff;" ' . $disabled . '>Validé</button>
                           </form>
                           <form id="archive-form-' . $demande->apogee . '" action="' . route('demandes.archiver', $demande->apogee) . '" method="POST" style="margin: 0;">
                               ' . csrf_field() . '
                               <button type="button" class="btn" onclick="confirmArchive(' . $demande->apogee . ')" style="width:auto; background-color:gray; color:#fff;" ' . $disabled . '>Archivé</button>
                           </form>
                       </div>';
            })
            ->setRowId(function ($demande) {
                return 'row-' . $demande->apogee; // Définit l'ID de la ligne
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

   //---------------------------------------------------------------------//


   public function fetchDemandes()
{
    $demandes = DB::table('demandes_etudiant')
        ->select([
            'demandes_etudiant.apogee',
            'etudient.Prenom as etudiant_prenom',
            'etudient.Email as etudiant_email',
            'etudient.telephone as etudiant_telephone',
            'demandes_etudiant.id_filiere',
            'demandes_etudiant.id_document',
            'etudient.Nom as etudiant_nom',
            'filiere.intitule as filiere_intitule',
            'document_admin.description as document_description'
        ])
        ->join('etudient', 'demandes_etudiant.apogee', '=', 'etudient.apogee')
        ->join('filiere', 'demandes_etudiant.id_filiere', '=', 'filiere.id_filiere')
        ->join('document_admin', 'demandes_etudiant.id_document', '=', 'document_admin.id_document');

    \Log::info($demandes->toSql()); // Log the SQL query
    \Log::info($demandes->get());   // Log the query results

    return DataTables::of($demandes)
        ->addColumn('actions', function($demande) {
            // Generate the action buttons with CSRF tokens and event handlers
            return '<div style="display: flex; gap: 5px;">
                        <form id="validate-form-' . $demande->apogee . '" action="' . route('demandes.valider', $demande->apogee) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . '
                            <button type="button" class="btn" onclick="confirmValidation(' . $demande->apogee . ')" style="width:auto; background-color:green; color:#fff;">Validé</button>
                        </form>
                        <form id="archive-form-' . $demande->apogee . '" action="' . route('demandes.archiver', $demande->apogee) . '" method="POST" style="margin: 0;">
                            ' . csrf_field() . '
                            <button type="button" class="btn" onclick="confirmArchive(' . $demande->apogee . ')" style="width:auto; background-color:gray; color:#fff;">Archivé</button>
                        </form>
                    </div>';
        })
        ->rawColumns(['actions']) // Ensure the HTML is not escaped
        ->make(true);
}

    
    
//------------------------------------------------------------//
    public function destroy($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->delete();

        return redirect()->back()->with('success', 'Demande supprimée avec succès.');
    }

    public function valider($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Marquer la demande comme validée
        $demande->status = 'validé';
        $demande->message = true; // Indiquer que la notification a été envoyée
        $demande->save();

        return redirect()->back()->with('success', 'Demande validée et étudiant notifié.');
    }

    public function archiver($apogee, Request $request)
    {
        $demande = Demande::where('apogee', $apogee)->firstOrFail();
        
        // Marquer la demande comme archivée
        $demande->archive = true;
        $demande->save();
    
        return redirect()->back()->with('success', 'Demande archivée.');
    }
}
