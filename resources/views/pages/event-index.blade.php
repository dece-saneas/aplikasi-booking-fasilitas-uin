<x-layouts>
    <x-slot name="title">Jadwal Peminjaman</x-slot>

    <x-slot name="style">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    </x-slot>

    <div class="card card-default">
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

                var Calendar = FullCalendar.Calendar;
                var calendarEl = document.getElementById('calendar');
                var events = {!!json_encode($events)!!};

                var calendar = new Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    themeSystem: 'bootstrap',
                    events: events
                });

                calendar.render();
            })
        </script>
    </x-slot>
</x-layouts>