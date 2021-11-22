<x-layouts>
    <x-slot name="title">Event</x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-body p-0">
                    <!-- THE CALENDAR -->
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            $(function() {

                /* initialize the calendar */
                var events = {!! json_encode($events) !!};

                var Calendar = FullCalendar.Calendar;
                var calendarEl = document.getElementById('calendar');

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