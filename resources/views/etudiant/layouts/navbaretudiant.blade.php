<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
   
    <style>
.navbar {
    box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
    font-family: 'Poppins', sans-serif;
    height: 70px;
    z-index: 1000;
    position: fixed;
    top: 0;
    width: 100%;
    background-color: #fff;
}

.navbar-brand {
    margin-right: auto;
}

.navbar-brand img {
    max-width: 100%;
    height: auto;
    margin: 5px 0;
}

.navbar-nav {
    margin-left: auto;
}

.navbar-collapse {
    flex-basis: auto;
}

.navbar-nav .nav-link {
    font-weight: 500;
    color: #173165;
    display: flex;
    align-items: center;
}

.dropdown-menu {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.dropdown-item {
    color: #173165;
}

.dropdown-item:hover,
.dropdown-item:focus {
    background-color: #f8f9fa;
    color: #173165;
}

@media (max-width: 1199.98px) {
    .navbar-collapse {
        background-color: #fff;
    }

<style>
    .navbar {
        box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        height:60px;
        z-index: 1000;
        position: fixed;
        top: 0;
        width: 100%;
        left: 0;
        right: 0;
        z-index: 1001;
        overflow-y: auto;
        max-height: calc(100vh - 70px);
        padding-top: 15px;
    }

    .navbar-collapse ul.navbar-nav {
        flex-direction: column;
        padding-left: 0;
    }

    .navbar-nav .nav-item {
        width: 100%;
    }

    .navbar-nav .nav-link {
        padding: 10px 15px;
    }

    .dropdown-menu {
        position: absolute;
        width: 100%;
        margin: 0;
        text-align: left;
        z-index: 1001;
    }

    .dropdown-toggle::after {
        display: inline-block;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        content: "";
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
    }

    .show .dropdown-menu {
        display: block;
    }

    .dropdown-text {
        margin-left: 5px;
    }

    .dropdown-toggle .bi {
        margin-right: 5px;
    }
}

@media (max-width: 991.98px) {
    .sidebar {
        width: 200px;
    }
}

@media (max-width: 767.98px) {
    .sidebar {
        width: 150px;
    }
}

@media (max-width: 575.98px) {
    .container {
        padding: 0 10px;
    }
}

/* Sidebar styles */
.sidebar {
    background-color: #173165;
    border-right: 0px solid #ffffff;
    width: 250px;
    height: 100%;
    position: fixed;
    top: 60px;
    left: 0;
    overflow-y: auto;
    z-index: 999;
    transition: left 0.3s ease;
}

#vertical-sidebar ul {
    list-style-type: none;
    padding: 0;
    color: #e9ecef;
}

#vertical-sidebar ul li {
    padding: 15px;
    transition: all 0.3s ease;
    width: 100%;
    display: block;
}

#vertical-sidebar ul li a {
    color: #ffffff;
    text-decoration: none;
}

#vertical-sidebar ul li.active {
    background-color: #3966c2;
}

.dropdown-item:hover {
    background-color: #cccccc;
}


     

    </style>
</head>

<body>
    
    <nav class="navbar">
        <div class="container">
            <img class="m-0 p-0 mt-0 img-logo" src="{{ asset('asset/images/logo.webp') }}" alt="suptech logo" width="13%">
            <div class="navbar-left">
                <div class="d-flex align-items-center"> 
                    @if($authUser)

                    

                        <span class="navbar-item p-3" style="text-decoration: none; color:#173165; font-weight: 600;">
                            {{ $authUser->Nom }} {{ $authUser->Prenom }}
                        </span>

                    @else
                        <a class="navbar-item p-5" href="#" style="text-decoration: none;">Nom utilisateur</a>
                    @endif


                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-person-fill icon-style" viewBox="0 0 16 16" style="color: #173165;">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="userDropdownMenu" >
                            <li>
                                <a class="dropdown-item" href="{{ route('logout.etudiant') }}" style="text-decoration: none;">Déconnexion</a></li>
                        </ul>

                </li>
                
                   
                </div>
            </div>
        </div>
    </nav>
       

    <div class="container-fluid">
        <div id="vertical-sidebar">

            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <ul class="list-unstyled">
                            <li class="p-2 mb-2 mt-5">
                                <svg class="icon-size icon-color" xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-mortarboard-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917z" />
                                    <path
                                        d="M4.176 9.032a.5.5 0 0 1-.656.327l-.5 1.7a.5.5 0 0 1 .294.605l4.5 1.8a.5.5 0 0 1 .372 0l4.5-1.8a.5.5 0 0 1 .294-.605l-.5-1.7a.5.5 0 0 1-.656-.327L8 10.466z" />
                                </svg>&nbsp;&nbsp;&nbsp;
                                <a class="lien" href="{{ route('Profil_etudiant') }}"
                                    class="{{ Request::is('Profil_etudiant') ? 'active' : '' }}"> Profil</a>
                            </li>
                            <li class="p-2 mb-2 ">
                                <svg class=" icon-color" xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                    <path
                                        d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>&nbsp;&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('etudiant.emplois') }}"
                                    class="{{ Request::is('etudiant.emplois') ? 'active' : '' }}">Emploi </a>
                            </li>
                            <li class="p-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8m5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0" />
                                    <path
                                        d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195z" />
                                    <path
                                        d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083q.088-.517.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1z" />
                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 6 6 0 0 1 3.13-1.567" />
                                </svg></svg>&nbsp;&nbsp;&nbsp;<a class="" href="{{ route('paiement') }}"
                                    class="{{ Request::is('paiement') ? 'active' : '' }}"> Paiement</a>
                            </li>

                            <li class="p-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0" />
                                </svg></svg>&nbsp;&nbsp;&nbsp;<a class="" href="{{ route('etudiant.views.exametudiant') }}"
                                    class="{{ Request::is('etudiant.views.exametudiant') ? 'active' : '' }}">Exams</a>
                            </li>
                            <li class="p-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                    fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                                </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('note') }}"
                                    class="{{ Request::is('note') ? 'active' : '' }}">Notes</a>
                            </li>
                            <li class="p-2 mb-2">


                                <div class="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-journal-plus me-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V11h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm12-9v10h-1V2h1z" />
                                    </svg>
                                    <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"style="color: #fff;">
                                        <a class="lien" href="{{ route('demande') }}" class="{{ Request::is('demande') ? 'active' : '' }}">Demandes</a>
                                       
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('demande') }}" style="color: black;">Demande</a></li>
                                        <li><a class="dropdown-item" href="{{ route('demandenotification') }}" style="color: black;">Notifications</a></li>
                                    </ul>
                                   
                                </div>
                               
                            </li>
                          

                                
                                                                
                              
                                                               
                               
                                                            </li>
                                                          
                                                                
                                                            
                                
                            <li class="p-2 mb-2">
                                <svg class=" icon-color" xmlns="http://www.w3.org/2000/svg" width="26"
                                    height="26" fill="currentColor" class="bi bi-person-fill-exclamation"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                                    <path
                                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5m0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                </svg>&nbsp;&nbsp;&nbsp;<a class="lien" href="{{ route('reclamation') }}"
                                    class="{{ Request::is('reclamation') ? 'active' : '' }}"> Réclamations</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>

                @yield('contenu')

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarItems = document.querySelectorAll('#vertical-sidebar ul li');

            sidebarItems.forEach(item => {

                if (item.querySelector('a').href === window.location.href) {
                    item.classList.add('active');
                }

                item.addEventListener('click', function() {
                    // Remove the 'active' class from all sidebar items
                    sidebarItems.forEach(i => i.classList.remove('active'));
                    // Add the 'active' class to the clicked item
                    this.classList.add('active');
                });
            });
        });
    </script>
    <script>
      
        var userButton = document.querySelector('.dropdown-toggle');
    
        
        var userDropdownMenu = document.querySelector('#userDropdownMenu');
    
        
        userButton.addEventListener('click', function() {
            
            userDropdownMenu.classList.toggle('show');
        });

    </script>
    <script>
        $(document).ready(function() {
            // Toggle sidebar on menu icon click
            $('#sidebarCollapse').on('click', function() {
                $('#vertical-sidebar').toggleClass('active');
            });

            // Close sidebar on outside click
            $(document).click(function(e) {
                if (!$(e.target).closest('.sidebar').length && !$(e.target).closest('#sidebarCollapse').length) {
                    $('#vertical-sidebar').removeClass('active');
                }
            });

            // Toggle dropdown menu
            $('#dropdownMenuButton').on('click', function() {
                $('#userDropdownMenu').toggleClass('show');
            });
        });

</script>
</body>