<link rel="icon" type="image/png" href="{{ asset('asset/images/logo_img.png') }}">
@extends('prof.layouts.navbarprof')
@section('contenu')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<div class="container-fluid mt-5" style="margin-left: 200px;margin-top: 120px;">
    <div class="container  barrecherche fixed-top-barre" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                
                <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    
                </div>
                <div class="container">
                    <table class="table table-striped" id="etudiants-table">
                        <thead>
                            <tr>
                                <th class="th-color border">Code Apogee</th>
                                <th class="th-color border">CNE</th>
                                <th class="th-color border">CNI</th>
                                <th class="th-color border">Nom</th>
                                <th class="th-color border">Prénom</th>
                                <th class="th-color border">CTR1</th>
                                <th class="th-color border">CTR2</th>
                                <th class="th-color border">EF</th>
                                <th class="th-color border">TP</th>
                                <th class="th-color border">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>

<script>
  
        $('#etudiants-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('fetch.etudiants') }}",
            columns: [
                { data: 'apogee', name: 'apogee' },
                { data: 'CNE', name: 'CNE' },
                { data: 'CNI', name: 'CNI' },
                { data: 'Nom', name: 'Nom' },
                { data: 'Prenom', name: 'Prenom' },
                { data: 'CTR1', name: 'CTR1' },
                { data: 'CTR2', name: 'CTR2' },
                { data: 'EF', name: 'EF' },
                { data: 'TP', name: 'TP' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    
</script>


@endsection
