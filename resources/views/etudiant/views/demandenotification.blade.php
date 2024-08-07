<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
@extends('etudiant.layouts.navbaretudiant')
<style>
    .demnde{
        color: black;
        font-family:'Times New Roman', Times, serif;
        font-weight: 600;
    }
    .alert{
        font-weight: 600;
    }
    @media (width: 1920px) {
    .container {
     max-width: 1700px; 
     
     margin-left:0px;
   
     
    }
  img{
    width: 150px;
  }
   
    
}


</style>
@section('contenu')

<div class="container " style="margin-top:20px;">
    

    @if($demandes->count() > 0)
    
        <div class="alert alert-success" role="alert">
            @foreach($demandes as $demande)
            <li class="demande" style="color: black;">Bonjour {{ $demande->etudient->Nom }} {{ $demande->etudient->Prenom }}</li> Voici vos demandes validées :
            <ul>
                
                 <li class="demnde">{{ $demande->document->description }}</li>
               
            </ul>
            @endforeach
        </div>
    @else
        <div class="alert alert-info" role="alert">
            Aucune demande validée à afficher.
        </div>
    @endif

    <!-- Autre contenu de l'espace étudiant -->
</div>
@endsection