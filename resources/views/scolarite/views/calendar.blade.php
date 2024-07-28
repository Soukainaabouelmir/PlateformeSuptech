@extends('scolarite.layouts.navbarscolarite')

@section('contenu')

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar {
            background-color: #0b3d71;
            color: white;
            border-radius: 8px 8px 0 0;
            padding: 10px;
        }

        .fc-toolbar-title {
            font-size: 24px;
            font-weight: bold;
        }

        .fc-button-group .fc-button {
            background-color: #0b3766;
            border: none;
            color: white;
        }

        .fc-button-group .fc-button:hover {
            background-color: #0056b3;
        }

        .fc-button-primary:not(:disabled).fc-button-active {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .fc-view-container {
            padding: 20px;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #092b4f;
            color: white;
            border-radius: 10px 10px 0 0;
            border: #092b4f;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        @media (max-width: 768px) {
            #calendar {
                margin: 20px auto;
                padding: 0 5px;
            }
        }
    </style>
</head>
<body>
    <div id="calendar"></div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        @csrf
                        <div class="form-group">
                            <select name="id_filiere" id="inputField1" class="form-control">
                                @foreach ($elements as $element)
                                <option value="{{ $element->id_element }}">{{ $element->intitule }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="groupe" id="inputField2">
                                <option value="1">GR1</option>
                                <option value="2">GR2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField3">Prof</label>
                            <input type="text" class="form-control" id="inputField3" placeholder="Enter something else">
                        </div>
                        <div class="form-group">
                            <label for="inputField4">Date</label>
                            <input type="date" class="form-control" id="inputField4">
                        </div>
                        <div class="form-group">
                            <label for="inputField5">Heure Début</label>
                            <select name="heure_debut" id="inputField5" class="form-control">
                                @foreach ($heure_debuts as $heure_debut)
                                <option value="{{ $heure_debut->id_heure_debut }}">{{ $heure_debut->heure_debut }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputField6">Heure Fin</label>
                            <select name="heure_fin" id="inputField6" class="form-control">
                                @foreach ($heure_fins as $heure_fin)
                                <option value="{{ $heure_fin->id_heure_fin }}">{{ $heure_fin->heure_fin }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                events: '/events',
                editable: true,
                selectable: true,
                select: function(info) {
                    // Show the modal when a date is selected
                    $('#eventModal').modal('show');
                },
                eventClick: function(info) {
                    // Handle event click if needed
                }
            });
            calendar.render();
        });

        function submitForm() {
            var field1 = document.getElementById('inputField1').value;
            var field2 = document.getElementById('inputField2').value;
            var field3 = document.getElementById('inputField3').value;
            var field4 = document.getElementById('inputField4').value;
            var field5 = document.getElementById('inputField5').value;
            var field6 = document.getElementById('inputField6').value;

            var eventData = {
                _token: "{{ csrf_token() }}",
                id_filiere: field1,
                groupe: field2,
                prof: field3,
                date: field4,
                heure_debut: field5,
                heure_fin: field6
            };

            $.ajax({
                url: '/save-event',
                method: 'POST',
                data: eventData,
                success: function(response) {
                    $('#eventModal').modal('hide');
                    location.reload(); // Reload the page to see the new event
                },
                error: function(error) {
                    console.error('Error saving event:', error);
                }
            });
        }
    </script>
</body>
</html>

@endsection
