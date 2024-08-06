<?php

namespace App\Http\Controllers;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Support\Facades\Log;
class PaiementScolariteController extends Controller
{
    public function index()
    {
        $paiement = Paiement::paginate(10); // Paginer les résultats avec 10 étudiants par page
        return view('scolarite.views.paiementscolarite', compact('paiement'));
    }
    public function paiementEtudiants(Request $request)
{
    $paiement = DB::table('paiement')
        ->select([
            'paiement.apogee',
            'paiement.date_paiement',
            'paiement.id_typepaiement',
            'paiement.id_modepaiement',
            'paiement.mois_concerne',
            'paiement.montant',
            'paiement.image',
            'etudient.Nom as etudiant_nom',
            'etudient.Prenom as etudiant_prenom',
            'etudient.Email as etudiant_email',
            'etudient.telephone as etudiant_telephone',
            'filiere.intitule as filiere_intitule',
            'mode_paiement.description as mode_paiement_description',
            'type_paiement.description as type_paiement_description'
        ])
        ->join('etudient', 'paiement.apogee', '=', 'etudient.apogee')
        ->join('mode_paiement', 'paiement.id_modepaiement', '=', 'mode_paiement.id_modepaiement')
        ->join('filiere', 'paiement.id_filiere', '=', 'filiere.id_filiere')
        ->join('type_paiement', 'paiement.id_typepaiement', '=', 'type_paiement.id_typepaiement');

    // Log the SQL query
    \Log::info($paiement->toSql());

    return DataTables::of($paiement)
        ->addColumn('image', function ($paiement) {
            if (strpos($paiement->image, '.jpg') !== false ||
                strpos($paiement->image, '.jpeg') !== false ||
                strpos($paiement->image, '.png') !== false ||
                strpos($paiement->image, '.gif') !== false) {
                return '<a href="' . asset('asset/images/' . $paiement->image) . '" target="_blank">' . $paiement->image . '</a>';
            } else {
                return '<a href="' . asset('asset/images/' . $paiement->image) . '" target="_blank">' . $paiement->image . '</a>';
            }
        })
        ->rawColumns(['image'])
        ->make(true);
}

}
