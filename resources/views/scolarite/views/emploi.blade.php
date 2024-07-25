<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('scolarite.layouts.navbarscolarite')

<style>
    #modifier {
        background-color: #173165;
        color: rgb(255, 255, 255);
        border: none;
        border-radius: 5px;
        width: 100%;
        height: 40px;
    }

    #modifier:hover {
        background-color: #3966c2;
    }

    @media (width: 2560px) {
        .container {
            max-width: 2600px;
        }
    }

    h3 {
        font-size: 25px;
        font-weight: 700;
    }
    @media (width: 1920px) {
        .content {
           
            margin-left: -20px;
            
        }
        img{
            width: 130px;
        }
    }
</style>

@section('contenu')
    <div id="informations-personnelles-content" class="content" style="margin-left: -20px; margin-top:120px; overflow: hidden;">
        <div class="content" style="margin-left: 320px; margin-top:20px; overflow: hidden;">
            <div id="reclamation" class="container">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('emploi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id_filiere"><strong>Etablissement:</strong></label>
                                </div>
                                <div class="col-md-12">
                                    <select name="code_postal" id="etablissement" class="form-control">
                                        <option value=""></option>
                                       
                                        <option value="28630">MOHAMMEDIA</option>
                                        <option value="44003">ESSAOUIRA</option>
                                  
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="id_filiere"><strong>Filiere:</strong></label>
                                </div>
                                <div class="col-md-12">
                                    <select name="id_filiere" id="id_filiere" class="form-control">
                                        <option value="">Sélectionner une filière</option>
                                        @foreach ($filieres as $filiere)
                                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="semestre"><strong>Semestre</strong></label>
                                <select class="form-control" id="semestre" name="id_semestre">
                                    <option value="0: undefined" selected></option>
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emploi_pdf"><strong>Emploi du temps (PDF)</strong></label>
                                <input type="file" name="emploi_pdf" id="emploi_pdf" class="form-control" accept=".pdf">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" id="modifier" name="enregistrer" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var etablissementDropdown = document.getElementById("etablissement");
         var cycleDropdown = document.getElementById("cycle");
        
         var filiereDropdown = document.getElementById("filiere");
        
         var groupeDropdown = document.getElementById("groupe");
       
        
         var niveauDropdown = document.getElementById("niveau");
        
         var options = {
             "CPI": {
                 "filieres": [""],
                 "niveaux":["","1ère Année","2ème Année"],
                 "groupes": ["","Groupe 1", "Groupe 2", "Groupe 3"],
                 "matieres": ["","Matière 1", "Matière 2", "Matière 3"]
             },
             "Licence": {
                 "filieres": ["","Maintenance Médicale", "Génie Industriel et Logistique Hospitalière", "Informatique Décisionnelle et e-Santé", "Sciences de Gestion", "Techniques de Laboratoires de Biologie Médicale", "Infirmier Polyvalent", "Infirmier en Anesthésie et Réanimation", "Infirmier en Instrumentalisation de Bloc Opératoire"],
                 "niveaux":[""],
                 "groupes": ["","Groupe A", "Groupe B", "Groupe C"],
                 "matieres": ["","Mathématiques", "Physique", "Chimie"]
             },
             "Ingénieur": {
                 "filieres": ["","Génie Biomédical", "Génie digital et intelligence Artificielle en santé", "Filière Ingénieur 3"],
                 "niveaux":[""],
                 "groupes": ["","Groupe X", "Groupe Y", "Groupe Z"],
                 "matieres": ["","Informatique", "Électronique", "Mécanique"]
             },
             "Master": {
                 "filieres": ["","Master en dispositifs médicaux et affaires réglementaires", "Master en Maintenance et Génie biomédical","Master en entreprenariat et Management Technologique"],
                 "niveaux":[""],
                 "groupes": ["","Groupe I", "Groupe II", "Groupe III"],
                 "matieres": ["","Recherche Opérationnelle", "Machine Learning", "Big Data"]
             }
         };
     
         
         cycleDropdown.addEventListener("change", function() {
           
             filiereDropdown.innerHTML = "";
             groupeDropdown.innerHTML = "";
             matiereDropdown.innerHTML = "";
            niveauDropdown.innerHTML = "";
             
             var selectedCycle = this.value;
             var selectedOptions = options[selectedCycle];
             
             selectedOptions.filieres.forEach(function(filiere) {
                 var option = document.createElement("option");
                 option.text = filiere;
                 filiereDropdown.add(option);
             });
             selectedOptions.groupes.forEach(function(groupe) {
                 var option = document.createElement("option");
                 option.text = groupe;
                 groupeDropdown.add(option);
             });
             selectedOptions.matieres.forEach(function(matiere) {
                 var option = document.createElement("option");
                 option.text = matiere;
                 matiereDropdown.add(option);
             });
             selectedOptions.niveaux.forEach(function(niveau) {
                 var option = document.createElement("option");
                 option.text = niveau;
                niveauDropdown.add(option);
             });
             
         });
        
        
     
     </script>
     

@endsection
