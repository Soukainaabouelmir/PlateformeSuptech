<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@extends('scolarite.layouts.navbarscolarite')
@section('contenu')
    <style>
        th {
            color: #173165;
        }

        /* Style général pour la select box */
        .form-select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
        }

        /* Style pour l'état hover */
        .form-select:hover {
            border-color: #356895;
        }

        /* Style pour l'état focus */
        .form-select:focus {
            border-color: #4e73df;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }
        @media (width: 2560px) {
        .container {
            max-width: 3000px;
            margin-left: -20px;
            
        }

        .modal-dialog {
            max-width: 800px;
        }
    }
    @media (width: 2028px) {
        .container {
            max-width: 3000px;
            margin-left: -20px;
            
        }

        img{
            width: 130px;
        }


        .modal-dialog {
            max-width: 800px;
        }

        img{
            width:130px;
        }

    }
    @media (width: 1920px) {
        .container {
            max-width: 3000px;
            margin-left: -20px;
            
        }

        img{
            width: 130px;
        }


        .modal-dialog {
            max-width: 800px;
        }

    }
    @media (width: 2px) {
        .container {
            max-width: 3000px;
            margin-left: -20px;
            
        }
        img{
            width: 130px;
        }

        img{
            width:130px;
        }
    }
    @media (width: 2300px) {
        .container {
            max-width: 3000px;
            margin-right: 20px;
            overflow:hidden;

            
        }

        .modal-dialog {
            max-width: 800px;
        }

        img{
            width:130px;
        }

    }
    @media (max-width: 320px) {
            .container {
                margin-left: 0;
                margin-top: 20px;
            }

            .btn {
                margin-left: 0;
                width: 100%;
            }
        }
        label{
           font-weight: 600;
            
        }
        h6{
            color: #ffffff;
            background-color: #173165;
        }
        
    </style>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #173165; margin-left: 70px;">
                        Ajouter un étudiant
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document"> <!-- Utilisation de modal-lg pour une largeur plus grande -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un étudiant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                    
                                    @if ($errors->any())
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="alert alert-danger">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                    
                                    <form action="{{ route('etudiants.store') }}" method="POST">
                                        @csrf
                                        
                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Nom">Nom:</label>
                                                    <input type="text" name="Nom" class="form-control" placeholder="Nom" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Prenom">Prénom:</label>
                                                    <input type="text" name="Prenom" class="form-control" placeholder="Prénom" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="CNE">Code Massar:</label>
                                                    <input type="text" name="CNE" class="form-control" placeholder="CNE" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="CNI">Code National:</label>
                                                    <input type="text" name="CNI" class="form-control" placeholder="CNI" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Sexe">Sexe:</label>
                                                    <select class="form-control" id="Sexe" name="Sexe" required>
                                                        <option value="" disabled selected></option>
                                                        <option value="M">Masculin</option>
                                                        <option value="F">Féminin</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Date_naissance">Date Naissance:</label>
                                                    <input type="date" name="Date_naissance" class="form-control" placeholder="Date de naissance" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Pays">Pays:</label>
                                                    <input type="text" name="Pays" class="form-control" placeholder="Pays" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Email">Email:</label>
                                                    <input type="email" name="Email" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telephone">Téléphone:</label>
                                                    <input type="text" name="telephone" class="form-control" placeholder="Téléphone" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Adresse">Adresse:</label>
                                                    <input type="text" name="Adresse" class="form-control" placeholder="Adresse" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Serie_bac">Série Bac:</label>
                                                    <input type="text" name="Serie_bac" class="form-control" placeholder="Série bac" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cinTuteur">CIN Tuteur:</label>
                                                    <input type="text" name="cinTuteur" class="form-control" placeholder="CIN tuteur" required>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nom_tuteur">Nom Tuteur:</label>
                                                    <input type="text" name="nom_tuteur" class="form-control" placeholder="Nom tuteur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="proffesion_tuteur">Profession Tuteur:</label>
                                                    <input type="text" name="proffesion_tuteur" class="form-control" placeholder="Profession tuteur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="telephone_tuteur">Téléphone Tuteur:</label>
                                                    <input type="text" name="telephone_tuteur" class="form-control" placeholder="Téléphone tuteur" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Specialite_diplome">Spécialité Diplôme:</label>
                                                    <input type="text" name="Specialite_diplome" class="form-control" placeholder="Spécialité diplôme">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="Mention_bac">Mention Bac:</label>
                                                    <input type="text" name="Mention_bac" class="form-control" placeholder="Mention bac" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Etablissement_bac">Établissement Bac:</label>
                                                    <input type="text" name="Etablissement_bac" class="form-control" placeholder="Établissement bac" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Pourcentage_bourse">Pourcentage Bourse:</label>
                                                    <select class="form-control" id="Pourcentage_bourse" name="Pourcentage_bourse" required>
                                                        <option value="" disabled selected></option>
                                                        <option value="0%">0%</option>
                                                        <option value="10%">10%</option>
                                                        <option value="20%">20%</option>
                                                        <option value="30%">30%</option>
                                                        <option value="40%">40%</option>
                                                        <option value="50%">50%</option>
                                                        <option value="60%">60%</option>
                                                        <option value="70%">70%</option>
                                                        <option value="80%">80%</option>
                                                        <option value="90%">90%</option>
                                                        <option value="100%">100%</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="num_annee">Date inscription:</label>
                                                    <input type="text" name="num_annee" class="form-control" placeholder="Numéro d'année" required>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code_etab">Établissement:</label>
                                                    <select name="code_etab" id="etablissement" class="form-control">
                                                        <option value="">Sélectionner un établissement</option>
                                                        @foreach ($etablissements as $etablissement)
                                                            <option value="{{ $etablissement->code_etab }}">{{ $etablissement->ville }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="id_filiere">Filière:</label>
                                                    <select name="id_filiere" id="id_filiere" class="form-control">
                                                        <option value="">Sélectionner une filière</option>
                                                        @foreach ($filieres as $filiere)
                                                            <option value="{{ $filiere->id_filiere }}">{{ $filiere->intitule }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #173165;">Ajouter </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        
                    <!-- Modifier Modal -->
                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier les informations de l'étudiant</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formModifierEtudiant" action="{{ route('update-etudiant') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputNom" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="inputNom" name="Nom">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPrenom" class="form-label">Prénom</label>
                                                <input type="text" class="form-control" id="inputPrenom" name="Prenom">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputCNE">CNE</label>
                                                <input type="text" class="form-control" id="inputCNE" name="CNE">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputCNI">CNI</label>
                                                <input type="text" class="form-control" id="inputCNI" name="CNI">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputDateNaissance">Date Naissance</label>
                                                <input type="date" class="form-control" id="inputDateNaissance" name="Date_naissance">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputSexe">Sexe</label>
                                                <input type="text" class="form-control" id="inputSexe" name="Sexe">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputPays">Pays</label>
                                                <input type="text" class="form-control" id="inputPays" name="Pays">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputSerie_bac">Série de bac</label>
                                                <input type="text" class="form-control" id="inputSerie_bac" name="Serie_bac">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail">Email</label>
                                                <input type="email" class="form-control" id="inputEmail" name="Email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputMention_bac">Mention Bac</label>
                                                <input type="text" class="form-control" id="inputMention_bac" name="Mention_bac">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputSpecialite_diplome">Spécialité diplôme</label>
                                                <input type="text" class="form-control" id="inputSpecialite_diplome" name="Specialite_diplome">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAdresse">Adresse</label>
                                                <input type="text" class="form-control" id="inputAdresse" name="Adresse">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEtablissement_bac">Établissement du diplôme</label>
                                                <input type="text" class="form-control" id="inputEtablissement_bac" name="Etablissement_bac">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputPourcentage_bourse">Pourcentage Bourse</label>
                                                <select class="form-control" id="inputPourcentage_bourse" name="Pourcentage_bourse">
                                                    <option value="" disabled selected></option>
                                                    <option value="0%">0%</option>
                                                    <option value="10%">10%</option>
                                                    <option value="20%">20%</option>
                                                    <option value="30%">30%</option>
                                                    <option value="40%">40%</option>
                                                    <option value="50%">50%</option>
                                                    <option value="60%">60%</option>
                                                    <option value="70%">70%</option>
                                                    <option value="80%">80%</option>
                                                    <option value="90%">90%</option>
                                                    <option value="100%">100%</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #173165;">Enregistrer les modifications</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
        
                    <div class="container mt-4">
                        <table class="table table-striped" id="etudiants-table">
                            <thead>
                                <tr>
                                    <th class="th-color border">Id étudiant</th>
                                    <th class="th-color border">CNE</th>
                                    <th class="th-color border">CNI</th>
                                    <th class="th-color border">Nom</th>
                                    <th class="th-color border">Prénom</th>
                                    <th class="th-color border">Téléphone</th>
                                    <th class="th-color border">Email</th>
                                    <th class="th-color border">Adresse</th>
                                    <th class="th-color border">Sexe</th>
                                    <th class="th-color border">Date Naissance</th>
                                    <th class="th-color border">Pays</th>
                                    <th class="th-color border">Serie de bac</th>
                                    <th class="th-color border">Année bac</th>
                                    <th class="th-color border">Spécialité diplôme</th>
                                    <th class="th-color border">Mention BAC</th>
                                    <th class="th-color border">Établissement diplôme</th>
                                    <th class="th-color border">Pourcentage bourse</th>
                                    <th class="th-color border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Ajouter du contenu dynamique ici -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
       
    $('#etudiants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('getDataEtudients') }}",
        columns: [
            { data: 'id', name: 'id' },
           
            { data: 'CNE', name: 'CNE' },
            { data: 'CNI', name: 'CNI' },
            { data: 'Nom', name: 'Nom' },
            { data: 'Prenom', name: 'Prenom' },
            { data: 'telephone', name: 'telephone' },
            { data: 'Email', name: 'Email' },
            { data: 'Adresse', name: 'Adresse' },
            { data: 'Sexe', name: 'Sexe' },
            { data: 'Date_naissance', name: 'Date_naissance' },
            { data: 'Pays', name: 'Pays' },
            
            { data: 'Serie_bac', name: 'Serie_bac' },
            { data: 'Annee_bac', name: 'Annee_bac' },
            { data: 'Specialite_diplome', name: 'Specialite_diplome' },
            { data: 'Mention_bac', name: 'Mention_bac' },
            { data: 'Etablissement_bac', name: 'Etablissement_bac' },
            { data: 'Pourcentage_bourse', name: 'Pourcentage_bourse' },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ]
    });
</script>

   
<script>
$(document).ready(function() {
    $('#etudiants-table').on('click', '.edit-btn', function(e) {
        e.preventDefault();

        var etudiantId = $(this).data('id');
        var row = $(this).closest('tr');
        var nom = row.find('td:eq(3)').text();
        var prenom = row.find('td:eq(4)').text();
        var cne = row.find('td:eq(1)').text();
        var cni = row.find('td:eq(2)').text();
        var dateNaissance = row.find('td:eq(9)').text(); 
        var sexe = row.find('td:eq(8)').text();
        var pays = row.find('td:eq(10)').text();
        var email = row.find('td:eq(6)').text();
        var serie_bac = row.find('td:eq(11)').text();
        var mention_bac = row.find('td:eq(14)').text();
        var specialite_diplome = row.find('td:eq(13)').text();
        var etablissement_bac = row.find('td:eq(15)').text();
        var pourcentage_bourse = row.find('td:eq(16)').text();
        var adresse = row.find('td:eq(7)').text();

        $('#id').val(etudiantId);
        $('#inputNom').val(nom);
        $('#inputPrenom').val(prenom);
        $('#inputCNE').val(cne);
        $('#inputCNI').val(cni);
        $('#inputDateNaissance').val(dateNaissance);
        $('#inputSexe').val(sexe);
        $('#inputPays').val(pays);
        $('#inputSerie_bac').val(serie_bac);
        $('#inputEmail').val(email);
        $('#inputMention_bac').val(mention_bac);
        $('#inputSpecialite_diplome').val(specialite_diplome);
        $('#inputEtablissement_bac').val(etablissement_bac);
        $('#inputPourcentage_bourse').val(pourcentage_bourse);
        $('#inputAdresse').val(adresse);

        $('#exampleModalEdit').modal('show');
    });
});
</script>
   
  
    <script>
        function confirmDelete(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet étudiant ?")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
    </script>
  
    
   </body>
@endsection

