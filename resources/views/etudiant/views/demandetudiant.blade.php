<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('etudiant.layouts.navbaretudiant')
@section('contenu')
<style>
    #demande {
        margin: 80px auto 50px;
        background-color: #b7b7b7;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        max-width: 800px; 
        width: 90%; 
        margin-left: auto; 
        margin-right: auto; 
    }

    h6 {
        color: #173165;
        margin-bottom: 10px;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 8px; 
        margin-bottom: 20px;
    }

    .button-enregistrer {
        width: 100%;
        padding: 10px;
        background-color:#173165;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .button-enregistrer:hover {
        background-color: #0d3d82;
    }

    @media (max-width: 320px) {
        #demande {
            padding: 20px; 
        }
        .form-control {
            padding: 6px;
        }
    }

    @media (min-width: 375px) {
        #demande {
            max-width: 80%; 
        }
    }

    @media (min-width: 425px) {
        #demande {
            max-width: 90%; 
        }
    }

    @media (min-width: 768px) {
        #demande {
            max-width: 600px; 
        }
    }

    @media (min-width: 1440px) {
        #demande {
            max-width: 900px; 
        }
    }

    @media (min-width: 1024px) {
        #demande {
            max-width: 800px; 
        }
    }

    @media (width: 2560px) {
        #demande {
            max-width: 1700px; 
            height: 500px;
            margin-left:-80px;
            margin-top: 120px;
        }
        .button-enregistrer {
            margin-top: 40px;
        }
        form {
            margin-top: 10px;
            margin: 20px;
            padding: 30px;
        }
    }

    @media (width: 1920px) {
        .container {
            max-width: 1700px; 
            margin-left: 20px;
        }
        img {
            width: 150px;
        }
    }

    #boutonInformations, #boutonCursus {
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

    #historique-demande-content {
        display: none;
    }
</style>


<div class="container" id="informations-demande-content" style="margin-left: 250px; margin-top:100px;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>

    <fieldset class="border p-4">

        <legend class="w-auto" style="font-size: 16px; color:#173165"><strong> Informations Demande</strong></legend>

        <form action="{{ route('endemande') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input class="form-control" type="hidden" name="apogee" value="{{ $user->apogee ?? '' }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Nom</h6>
                    <input class="form-control" type="text" placeholder="Votre nom" name="Nom" value="{{ $user->Nom ?? '' }}" readonly>
                </div>
                <div class="col-md-6">
                    <h6>Prénom</h6>
                    <input class="form-control" type="text" placeholder="Votre prénom" name="Prenom" value="{{ $user->Prenom ?? '' }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h6>Filière</h6>

                    <select class="form-control" id="filiere" name="id_filiere" required>
                        <option value="" disabled selected></option>
                        <option value="2">Génie Industriel et Logistique Hospitalière</option>
                        <option value="1">Classes Préparatoires</option>
                        <option value="3">Sciences de Gestion en Milieu Hospitalier et Industrie Médicale</option>
                        <option value="4">Génie Digital et Intélligence Artificielle en santé</option>
                        <option value="5">Dispositifs Médicaux et affaires Réglementaires</option>
                        <option value="6">Génie Biomédical</option>
                        <option value="7">Maintenance Médicale</option>
                        <option value="8">Entrepreneuriat et Management Technologique</option>

                    </select>
                </div>
                <div class="col-md-6">
                    <h6>Semestre</h6>
                    <select class="form-control" id="semestre" name="semestre">
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>

                        <option value="S3">S3</option>
                        <option value="S4">S4</option>
                        <option value="S5">S5</option>
                        <option value="S6">S6</option>
                        
                    </select>
                </div>
            </div>
            
          
            <div class="row">
                <div class="col-md-12">
                    <h6>Type de demande :</h6>
                    <select class="form-control" name="id_document">
                        <option value="1">Attestation Inscription</option>
                        <option value="2">Relevé de Note</option>
                    </select>
                </div>
            </div>

                    </select>
                    
            <div class="row">
                <div class="col-md-12">
                    <button class="btn button-enregistrer">Enregistrer</button>
                </div>
            </div>
                </div>
            </div>
           

        </form>
    </fieldset>
</div>  </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    const boutonInformations = document.getElementById('boutonInformations');
    const boutonCursus = document.getElementById('boutonCursus');
    
    boutonInformations.addEventListener('click', function() {
        document.getElementById('informations-demande-content').style.display = 'block';
        document.getElementById('historique-demande-content').style.display = 'none';
    });
    
    boutonCursus.addEventListener('click', function() {
        document.getElementById('historique-demande-content').style.display = 'block';
        document.getElementById('informations-demande-content').style.display = 'none';
    });
</script>

@endsection

