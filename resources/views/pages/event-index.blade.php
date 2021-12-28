<x-layouts>
    <x-slot name="title">Jadwal Peminjaman</x-slot>

    <x-slot name="style">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    </x-slot>

    <div class="card card-default card-calendar">
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>

    <x-slot name="script">
        <!-- fullCalendar 2.2.5 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
        <script>
            $(function() {

                $.ajax({
                    url: "{{ route('jadwal-peminjaman.index') }}",
                    type: "GET",
                    dataType: 'json',
                    success: callback,
                });

                function callback(response) {

                    var Calendar = FullCalendar.Calendar;
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new Calendar(document.getElementById('calendar'), {
                        headerToolbar: {
                            left: 'title',
                            center: 'dayGridMonth,timeGridWeek,timeGridDay',
                            right: 'prev,next today'
                        },
                        themeSystem: 'bootstrap',
                        events: response
                    });

                    calendar.render();
                }
            })
        </script>
    </x-slot>
</x-layouts>