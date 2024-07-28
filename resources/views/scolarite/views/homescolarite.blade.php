<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('scolarite.layouts.navbarscolarite')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

@section('contenu')
    <style>
        .custom-background:hover {
            background-color: #1858b1;
            transform: translateY(-5px);
        }

        .custom-background {
            background-color: #173165;
        }
        .navbar {
        box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
       
       
        position: fixed;
        top: 0;
        width: 100%;
       
    }
    

        /* For screens smaller than 320px */
        @media screen and (max-width: 320px) {

            /* Adjust the margin and padding for smaller screens */
            #page-content {
                margin-left: 10px;
                margin-right: 10px;
                padding: 20px;
            }
        }

        /* For screens between 321px and 375px */
        @media screen and (min-width: 321px) and (max-width: 375px) {

            /* Adjust the margin and padding for smaller screens */
            #page-content {
                margin-left: 20px;
                margin-right: 20px;
                padding: 30px;
            }
        }

        /* For screens between 376px and 425px */
        @media screen and (min-width: 376px) and (max-width: 425px) {

            /* Adjust the margin and padding for smaller screens */
            #page-content {
                margin-left: 30px;
                margin-right: 30px;
                padding: 40px;
            }
        }

        /* For screens between 426px and 768px */
        @media screen and (min-width: 426px) and (max-width: 768px) {

            /* Adjust the margin and padding for medium screens */
            #page-content {
                margin-left: 50px;
                margin-right: 50px;
                padding: 50px;
            }
        }

        /* For screens between 769px and 1024px */
        @media screen and (min-width: 769px) and (max-width: 1024px) {

            /* Adjust the margin and padding for medium screens */
            #page-content {
                margin-left: 100px;
                margin-right: 100px;
                padding: 60px;

            }
        }

        /* For screens between 1025px and 1440px */
        @media screen and (min-width: 1025px) and (max-width: 1440px) {

            /* Adjust the margin and padding for large screens */
            #page-content {
                margin-left: 150px;
                margin-right: 150px;
                padding: 70px;
                overflow-x: hidden;
            }
        }

        /* For screens between 1441px and 2560px */
        @media screen and (min-width: 1440px) and (max-width: 2560px) {

            /* Adjust the margin and padding for extra large screens */
            #page-content {
                margin-left: 200px;
                margin-right: 200px;
                padding: 80px;

            }
        }

        /* For screens larger than 2560px */
        @media screen and (min-width: 2561px) {

            /* Adjust the margin and padding for extra large screens */
            #page-content {
                margin-left: 250px;
                margin-right: 250px;
                padding: 90px;
            }

        }
    </style>

<div id="page-content" class="d-flex flex-column" style="margin-left: 250px; padding: 20px;
margin-right:10px;margin-top:20px; padding: 40px ;
">
    <div class="d-flex justify-content-left">
       <a href="{{ route('listetudiant') }}"> <div class="card mb-3 mr-3 mt-4  custom-background" style="width: 300px;color:#ffffff; margin-right: 20px;">
            <!-- Contenu de la carte "Mon Profil" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16"style="color: #ede8e8">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('listetudiant') }}" style="color: #ede8e8; text-decoration:none;">Liste des Etudiants</a></h5>
               
            </div>
         </div></a>
         <a href="{{ route('absence') }}" ><div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            <!-- Contenu de la carte "Mes Demandes" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16" style="color: #ede8e8">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('absence') }}"  style="color: #ede8e8;text-decoration:none;">L'absence des Etudiants</a></h5>
                
            </div>
        </div></a>
        <a href="{{ route('scolarite.views.notificationsexam') }}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;
            color:#ffffff;margin-right: 20px;">
                <!-- Contenu de la carte "Mes Exams" -->
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16" style="color: #ede8e8">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                      </svg>
                    
                    <h5 class="card-title" style="color: #ede8e8" ><a href="{{ route('scolarite.views.notificationsexam') }}" style="color: #ede8e8;text-decoration:none;">Notifications Exames</a></h5>
                    
                </div>
            </div></a>
        <!--<a href="{{ route('paiementscolarite') }}" > <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
           
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16" style="color: #ffffff">
                    <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5"/>
                    <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('paiementscolarite') }}" style="color: #ede8e8;text-decoration:none;">Horaire du Professeur</a> </h5>
                
            </div>
        </div></a>-->
        
       
    
    </div>

    <div class="d-flex justify-content-left">
        
            <a href="{{ route('paiementscolarite') }}" > <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
                <!-- Contenu de la carte "Mes Notes" -->
                <div class="card-body text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16"  style="color: #ede8e8">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0"/>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z"/>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567"/>
                      </svg>
                    <h5 class="card-title" style="color: #ede8e8"><a href="{{ route('paiementscolarite') }}" style="color: #ede8e8;text-decoration:none;">Suivie de Paiement</a> </h5>
                    
                </div>
            </div></a>
        <a href="{{ route('demandescolarite') }}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            <!-- Contenu de la carte "Emploi du temps" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16" style="color: #ede8e8">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8"> <a href="{{ route('demandescolarite') }}" class="{{ Request::is('emploi') ? 'active' : '' }}" style="color: #ede8e8;text-decoration:none;">Demandes Etudaints</a></h5>
               
            </div>
        </div></a>
        
        <a href="{{ route('reclamationscolarite') }}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 300px;color:#ffffff;margin-right: 20px;">
            <!-- Contenu de la carte "Mes Réclamations" -->
            <div class="card-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16" style="color: #ede8e8">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
                  </svg>
                <h5 class="card-title" style="color: #ede8e8">  <a href="{{ route('reclamationscolarite') }}"  style="color: #ede8e8;text-decoration:none;">Réclamations Etudiants</a></h5>
                
            </div>
        </div></a>
    </div>
        <div class="d-flex justify-content-left">
            <a href="{{ route('scolarite.views.emploi') }}"> <div class="card mb-3 mr-3 mt-4 custom-background" style="width: 280px;color:#ffffff;margin-right: 20px;">
            
                <div class="card-body text-center">
                     <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-calendar-week-fill" viewBox="0 0 16 16"  style="color: #ede8e8;">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M9.5 7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5m3 0h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-9 4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H4a.5.5 0 0 0-.5.5v1zm3.5-.5h1a.5.5 0 0 0 .5.5v1a.5.5 0 0 0-.5.5h-1a.5.5 0 0 0-.5-.5v-1a.5.5 0 0 0 .5-.5zm1.5-2.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1z"/>
                      </svg>
                    <h5 class="card-title" style="color: #ede8e8">  <a href="{{ route('scolarite.views.emploi') }}"  style="color: #ede8e8;text-decoration:none;">Emploi du Temps</a></h5>
                    
                </div>
            </div></a></div>
                
                       
                          
                     
          
    </div></div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     @endsection               

   