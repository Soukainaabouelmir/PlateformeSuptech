<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
    <style>
        .month-btn {
            background-color: rgb(210, 9, 9);
            /* Changez la couleur selon vos préférences */
            color: white;
            /* Changez la couleur du texte si nécessaire */
            width: 100px;
        }

        .month-btn:not(:disabled):not(.disabled).active {
            background-color: #4CAF50;
        }


        .btn-primary {
            background-color: #3966c2;
            width: 100px;
        }

        .month-btn {
            margin: 5px;
        }

        .btn-close {
            background-color: #3966c2;
        }

        #modifier {
            background-color: #173165;
            color: rgb(255, 255, 255);
            border: none;
            border-radius: 5px;
            width: 100%;
            height: 40px;
        }

        #modifier:hover {
            background-color: #3966c2
        }

        .camera-button {

            background-color: transparent;
            border: none;

        }
        @media (min-width: 2065px) {
    form{
        width: 1900px;
        margin-left: 130px;
        margin-top: 80px; /* Rétablir la largeur maximale pour les écrans plus grands */
    }
    
}
#boutonInformations, #boutonCursus{
    background-color: #173165; 
    color: white; 
   
    text-align: center; 
    text-decoration: none; 
 padding: 5px;
    font-size: 17px; 
    margin: 4px 2px; 
    cursor: pointer;
    border-radius: 5px;
    border: 5px #173165; 
    transition-duration: 0.4s; 
}
#historique-paiement-content{
    display: none;
}
.content{
   
    border: 2px ;
       padding: 5px;
       
     height: auto;
     width: auto;
}
        
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                  
                    
                </div>
                <div class="card-body">
                    <div class="basic-elements">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <form id="informations-personnelles" action="{{ route('enpaiement') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monthModal" style="background-color: #173165;">
                                Mois
                            </button>
        
                            <!-- Modal -->
                            <div class="modal fade" id="monthModal" tabindex="-1" role="dialog" aria-labelledby="monthModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="monthModalLabel">Mois</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Boutons radio pour les mois de l'année -->
                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Janvier" id="paiement_id"
                                                        name="mois_concerne[]" style="background-color: red;"> Janvier
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Fevrier" id="paiement_id"
                                                        name="mois_concerne[]"> Février
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Mars" id="paiement_id"
                                                        name="mois_concerne[]"> Mars
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Avril" id="paiement_id"
                                                        name="mois_concerne[]"> Avril
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Mai" id="paiement_id"
                                                        name="mois_concerne[]"> Mai
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Juin" id="paiement_id"
                                                        name="mois_concerne[]"> Juin
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Juillet" id="paiement_id"
                                                        name="mois_concerne[]"> Juillet
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Aout" id="paiement_id"
                                                        name="mois_concerne[]"> Août
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Septembre" id="paiement_id"
                                                        name="mois_concerne[]"> Septembre
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Octobre" id="paiement_id"
                                                        name="mois_concerne[]"> Octobre
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Novembre" id="paiement_id"
                                                        name="mois_concerne[]"> Novembre
                                                </label>
                                                <label class="btn btn-outline-secondary month-btn">
                                                    <input type="checkbox" class="month-checkbox" value="Decembre" id="paiement_id"
                                                        name="mois_concerne[]"> Décembre
                                                </label>
                                            </div>
        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                style="background-color: #3966c2">Fermer</button>
                                            <button type="button" id="savebtn" class="btn btn-primary"
                                                style="background-color: #3966c2">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" class="form-control" id="Email" name="apogee"  value="{{ $user->apogee ?? '' }}" readonly>
                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->Nom ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" id="Email" name="Email"  value="{{ $user->Email ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->telephone ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Paiement</label>
                                        <input type="date" class="form-control" id="date_paiement" name="date_paiement" required>
                                    </div>
                                   

                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->Prenom ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>CNI</label>
                                        <input type="text" class="form-control" id="nom" name="Nom" value="{{ $user->CNI ?? '' }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>La Somme totale 
                                            :</label>
                                            <input type="number" class="form-control" id="nom" name="montant" value="" required>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>Choix</label>
                                    
                                            <select class="form-control" name="id_typepaiement">
                                                <option value="1">Ecole</option>
                                                <option value="2">Internat</option>
                                                <option value="3">Salle de Sport</option>
                                                <option value="4">Transport</option>
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="mode"><strong>Mode de règlement Scolaire:</strong></label>
                                        <div class="mode-reglement_radio d-flex justify-content-start">
                                            <label for="mode"><strong>Mode de règlement Scolaire:</strong></label>
                            <div class="mode-reglement_radio d-flex justify-content-start">
                                <label class="mr-3">
                                    <input type="radio" name="id_modepaiement" value="1">
                                    Espèces
                                </label>
                                <label class="mr-3">
                                    <input type="radio" name="id_modepaiement" value="2">
                                    Chéque
                                </label>
                                <label>
                                    <input type="radio" name="id_modepaiement" value="3">
                                    Virement
                                </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="inputFile" class="camera-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                    class="bi bi-camera-fill ml-2" viewBox="0 0 16 16" style="color: #173165">
                                    <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                    <path
                                        d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0" />
                                </svg>
                                Choisir un image <span style="color:rgb(73, 72, 72); font-size:13px;">(En cas de chèque ou de virement)</span>
                            </label>
                            <input type="file" id="inputFile" name="image" style="display: none;"></div>
                            <button type="submit" id="modifier" name="modifier" class="btn btn-primary">Valider</button>
        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /# column -->
        
                            
               
        <!-- /# column -->
    </div>                          
                              
                                   
    
               



    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>


  
       
               
                
               
              
              
              
             
               
              
                
              
     

    <script>
       
        document.querySelectorAll('.month-btn').forEach(button => {
            button.addEventListener('click', function() {
                
                const month = this.getAttribute('data-month');
                
            });
        });
       
        const monthButtons = document.querySelectorAll('.month-btn');

      
        monthButtons.forEach(button => {
            
            button.addEventListener('click', () => {
                
                const isActive = button.classList.contains('active');

                // Si le bouton est actif, supprimez la classe "active", sinon ajoutez-la
                if (isActive) {
                    button.classList.remove('active');
                } else {
                    button.classList.add('active');
                }
            });
        });

        function enregistrerPaiement() {
    var moisSelectionnes = [];
    // Parcours des cases cochées
    $('.month-checkbox:checked').each(function() {
        moisSelectionnes.push($(this).val());
    });
    $.ajax({
        type: 'POST',
        url: '{{ route('enpaiement') }}', 
        data: {
            mois_concerne: moisSelectionnes
        },
        success: function(response) {
            
            alert('Mois enregistrés avec succès!');
        },
        error: function(xhr, status, error) {

            console.error(error);
        }
    });
}

$('#savebtn').on('click', function() {
    enregistrerPaiement();
});


        
    </script>



@endsection