<?php 
// app/Http/Controllers/ExamNotificationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Filiere;
use App\Models\Programme_Evaluation;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;

class ExamNotificationController extends Controller
{
   

    public function create()
    {
        $elements = Element::all();
        $filieres = Filiere::all();
        
        return view('scolarite.views.notificationsexam', compact('elements', 'filieres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_element' => 'required|exists:element,id_element',
            'id_filiere' => 'required|exists:filiere,id_filiere',
            'code_postal' => 'required|exists:etablissement,code_postal',
            'date_exam' => 'required',
            'heure_exam' => 'required',
        ]);

        Programme_Evaluation::create([
            'id_element' => $request->id_element,
            'id_filiere' => $request->id_filiere,
            'code_postal' => $request->code_postal,
            'date_exam' => $request->date_exam,
            'heure_exam' => $request->heure_exam,
        ]);

        
        return redirect()->route('scolarite.views.notificationsexam')->with('success', 'Notification envoyée avec succès.');
    }

    public function studentExams()
    {
        $studentId = Auth::guard('etudient')->id();

        
        $filieres = Inscription::where('apogee', $studentId)->pluck('id_filiere');
      
        // Récupérer les examens associés à ces filières
        $exams = Programme_Evaluation::whereIn('id_filiere', $filieres)->get();

        return view('etudiant.views.exametudiant', compact('exams'));
    }
}