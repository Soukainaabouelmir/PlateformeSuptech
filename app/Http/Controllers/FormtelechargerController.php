<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use App\Models\Groupe;
use App\Models\Element;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class FormtelechargerController extends Controller
{
    public function enregistrercahiertext(Request $request)
    {
       
        $request->validate([

        ]);

        $donnees = $request->all();

        $hd = $request->input('hd');
        $hf = $request->input('hf');
        $date= $request->input('date');
        $activite = $request->input('activite');

        $matiereExistante = Element::where('intitule', $donnees['matiere'])->first();
        if ($matiereExistante) {
            $donnees['num_element'] = $matiereExistante->num_element;
        }

        $groupeExistante = Groupe::where('intitule', $donnees['groupe'])->first();
        if ($groupeExistante) {
            $donnees['id_groupe'] = $groupeExistante->id;
        }

        $donnees['heure_depart'] = $hd;
        $donnees['heure_fin'] = $hf;
        $donnees['date_seance'] = $date;
        $donnees['objectif'] = $activite;

        Seance::create($donnees);

        return redirect()->back()->with('success', 'Les données ont été enregistrées avec succès');
    }

    public function telechargerFichier(Request $request)
    {
        $enseignantName = $request->input('enseignant');
       

        $seances = Seance::select(
            'seance.date_seance',
            'seance.heure_depart',
            'seance.heure_fin',
            'seance.objectif',
            'element.intitule as Matiere',
            'groupe.intitule as Groupe',
            'filiere.intitule as Filiere',
            'filiere.cycle as Cycle',
            'etablissement.intitule as Etablissement'
        )
        ->join('element', 'element.num_element', '=', 'seance.num_element')
        ->join('groupe', 'groupe.id_groupe', '=', 'seance.id_groupe')
        ->join('filiere', 'filiere.id_filiere', '=', 'inscriptions.id_filiere')
        ->join('etudient', 'etudient.apogee', '=', 'inscriptions.apogee')
        ->join('etablissement', 'etablissement.code_etab', '=', 'inscriptions.code_etab')
        ->join('inscriptions', 'inscriptions.apogee', '=', 'etudient.apogee')
        ->join('groupe', 'groupe.id_filiere', '=', 'filiere.id_filiere')
        ->get();

        $imagePath = public_path('asset/images/logo_img.png');

        $contenu = "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Cahier de textes</title>
            <style>
                // Styles CSS
            </style>
        </head>
        <body>
            <div class='container'>";

        foreach ($seances as $seance) {
            $contenu .= "<img src='data:image/png;base64," . base64_encode(file_get_contents($imagePath)) . "' alt='Logo'>
                <h3>CAHIER DE TEXTES</h3>
                <div class='info'>
                    <p><span class='strong-label'>Cycle :</span> " . htmlspecialchars($seance->Cycle) . "</p>
                    <p><span class='strong-label'>Filière :</span> " . htmlspecialchars($seance->Filiere) . "</p>
                    <p><span class='strong-label'>Groupe :</span> " . htmlspecialchars($seance->Groupe) . "</p>
                    <p><span class='strong-label'>Niveau :</span> " . htmlspecialchars($seance->Filiere) . "</p>
                    <p><span class='strong-label'>Matière :</span> " . htmlspecialchars($seance->Matiere) . "</p>
                </div>
                <hr>
                <div class='seance-info'>
                    <p><span class='strong-label enseignant'>Enseignant :</span> " . htmlspecialchars($enseignantName) . "</p>
                    <p><span class='strong-label'>Horaire :</span> " . htmlspecialchars($seance->heure_depart . ' - ' . $seance->heure_fin) . "</p>
                    <p><span class='strong-label date'>Date Séance :</span> " . htmlspecialchars($seance->date_seance) . "</p>
                </div>
                <p class='activites'><span class='strong-label'>Activités objectifs de la séance :</span> " . htmlspecialchars($seance->objectif) . "</p>
                <hr>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date Absence</th>
                            <th>Activités</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Ajoutez ici les données des étudiants pour cette séance -->
                    </tbody>
                </table>";
        }

        $contenu .= "</div>
        </body>
        </html>";

        // Convertir le contenu HTML en PDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($contenu);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('Cahierdetextes.pdf');
    }
}
