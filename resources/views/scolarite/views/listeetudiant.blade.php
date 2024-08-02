

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
<!-- Assurez-vous que FontAwesome est inclus -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link href="{{ asset('asset/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
</head>
<style>
    .logo{
        background-color: rgb(255, 255, 255);
    }
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
      
        label{
           font-weight: 600;
            
        }
        h6{
            color: #ffffff;
            background-color: #173165;
        }
</style>
<body>


    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo"> <a class="navbar-brand" href=""><img class="m-0 p-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="70%" style="margin-left: 10px;"></div>
                <ul>
                    
                   
                   
                    <li><a href="{{ route('listetudiant') }}"><i class="ti-view-list-alt"></i> Liste étudiants </a></li>
                    <li><a href="{{ route('demandescolarite') }}"><i class="ti-files"></i>  Demandes étudiants</a></li>
                    <li><a href="{{ route('paiementscolarite') }}"><i class="ti-user"></i> Paiement étudiants</a></li>
                    <li><a href="{{ route('reclamationscolarite') }}"><i class="ti-layout-grid2-alt"></i> Réclamations étudiants</a></li>
                   
                    <li><a href="{{ route('scolarite.views.emploi') }}"><i class="ti-calendar"></i> Emploi du Temps </a>
                       
                    </li>
                    <li><a href="{{ route('scolarite.views.notificationsexam') }}"><i class="ti-email"></i> Notifications Exams </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence étudiants </a>
                       
                    </li>
                    <li><a class="sidebar-sub-toggle"><i class="ti-layout-grid4-alt"></i> Absence Prof </a>
                       
                    </li>
                   
                    
                   
                   
                    
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->


<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">
                  
                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <li class="nav-item">
                                @if (Auth::user())
                                    <span class="navbar-text" style="color:#173165; font-size:15px;font-weight:600;">
                                        {{ Auth::user()->name }}
                                    </span>
                                @else
                                    <a class="nav-link" href="#" style="color: #173165;">Nom utilisateur</a>
                                @endif
                                <i class="ti-user" style="color:#173165;" ></i>
                            </li>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-close"></i>  déconnecter
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="bootstrap-data-table-panel">
                                <div class="table-responsive">
                                    
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #94969a; border:none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                          </svg>&nbsp;&nbsp;Ajouter 
                                    </button>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 30px;">
                                        <div class="modal-dialog modal-lg" role="document"> 
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
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
                                                                <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #173165;">Ajouter Étudiant</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Modal HTML -->
                                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modifier l'Étudiant</h5>
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
                                                                <label for="inputNom">Nom</label>
                                                                <input type="text" class="form-control" id="inputNom" name="Nom">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="inputPrenom">Prénom</label>
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
                                                                <label for="inputEmail">Email</label>
                                                                <input type="email" class="form-control" id="inputEmail" name="Email">
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary" style="width: 100%; background-color: #173165;">Enregistrer les modifications</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="etudiants-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Apogee</th>
                                                <th>CNE</th>
                                                <th>CNI</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                                <th>Email</th>
                                                <th>Adresse</th>
                                                <th>Sexe</th>
                                                <th>Date Naissance</th>
                                                <th>Filiere</th>
                                                <th>Etablissement</th>
                                                <th>Nom Tuteur</th>
                                                <th>Téléphone Tuteur</th>
                                                <th>Adresse Tuteur</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- jquery vendor -->
<script src="{{ asset('asset/js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/jquery.nanoscroller.min.js') }}"></script>
<!-- nano scroller -->
<script src="{{ asset('asset/js/lib/menubar/sidebar.js') }}"></script>
<script src="{{ asset('asset/js/lib/preloader/pace.min.js') }}"></script>
<!-- sidebar -->
<!-- bootstrap -->
<script src="{{ asset('asset/js/lib/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/scripts.js') }}"></script>
<!-- scripit init-->
<script src="{{ asset('asset/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.flash.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('asset/js/lib/data-table/datatables-init.js') }}"></script>
<script>
$(document).ready(function() {
    $('#etudiants-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ route('etudiants.data') }}",
            "type": "GET",
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'apogee', name: 'apogee' },
            { data: 'CNE', name: 'CNE' },
            { data: 'CNI', name: 'CNI' },
            { data: 'Nom', name: 'Nom' },
            { data: 'Prenom', name: 'Prenom' },
            { data: 'telephone', name: 'telephone' },
            { data: 'Email', name: 'Email' },
            { data: 'Adresse', name: 'Adresse' },
            { data: 'Sexe', name: 'Sexe' },
            { data: 'Date_naissance', name: 'Date_naissance' },
            { data: 'filiere', name: 'filiere' },
            { data: 'ville', name: 'ville' },
            { data: 'tuteur_nom', name: 'tuteur_nom' },
            { data: 'tuteur_tel1', name: 'tuteur_tel1' },
            { data: 'tuteur_adresse', name: 'tuteur_adresse' },
            {
                data: 'actions',
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'all'
                    }
                }
            }
        ]
    });

    // Code pour afficher le modal lors du clic sur le bouton "Modifier"
   
});
</script>
<script>
      
      $(document).ready(function() {
    $('#etudiants-table').on('click', '.edit-btn', function(e) {
        e.preventDefault();

        var etudiantId = $(this).data('id');
        var row = $(this).closest('tr');
        var nom = row.find('td:eq(4)').text();
        var prenom = row.find('td:eq(5)').text();
        var cne = row.find('td:eq(2)').text();
        var cni = row.find('td:eq(3)').text();
        var dateNaissance = row.find('td:eq(10)').text(); 
        var sexe = row.find('td:eq(9)').text();
        var email = row.find('td:eq(7)').text();
        var telephone = row.find('td:eq(6)').text();
        var adresse = row.find('td:eq(8)').text();

        $('#id').val(etudiantId);
        $('#inputNom').val(nom);
        $('#inputPrenom').val(prenom);
        $('#inputCNE').val(cne);
        $('#inputCNI').val(cni);
        $('#inputDateNaissance').val(dateNaissance);
        $('#inputSexe').val(sexe);
        $('#inputEmail').val(email);
       // Vérifiez que vous avez cet input avec cet ID
        $('#exampleModalEdit').modal('show');
    });
});




  </script>
</body>
</html>
