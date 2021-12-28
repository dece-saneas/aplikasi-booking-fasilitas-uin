<x-layouts>
    <x-slot name="title">Jadwal Peminjaman</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <!-- fullCalendar -->
        <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.css') }}">
    </x-slot>

    <div class="card card-default card-calendar">
        <div class="card-body row justify-content-center text-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Fasilitas</label>
                            <select class="form-control select" id="selectFacility" width="100%">
                                <option></option>
                                @foreach($facilities as $facility)
                                <option value="{{ $facility->id }}" @if($facility->id == $unit->facility->id) selected @endif>{{ $facility->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Pilih Unit</label>
                            <select class="form-control select" id="selectUnit" width="100%">
                                <option>{{ $unit->name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="calendar"></div>
        </div>
        <div class="card-body">
            <h6><i class="fas fa-circle mr-2" style="color: #009f14;"></i>Di Setujui dan Di Izinkan</h6>
            <h6><i class="fas fa-circle mr-2" style="color: #feff00;"></i>Belum Di Izinkan</h6>
            <h6><i class="fas fa-circle mr-2" style="color: #d42729;"></i>Tidak Di Izinkan</h6>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- fullCalendar 2.2.5 -->
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/fullcalendar/main.js') }}"></script>
        <script>
            $('.select').select2({
                placeholder: "Pilih",
                allowClear: true
            })
            $(document).ready(function() {
                // Fetch Units
                $('#selectFacility').on('change', function() {
                    var idFacility = this.value;
                    $("#selectUnit").html('');
                    $.ajax({
                        url: "{{ route('api.fetch-units') }}",
                        type: "POST",
                        data: {
                            facility_id: idFacility,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#selectUnit').html('<option></option>');
                            $.each(result.units, function(key, value) {
                                $("#selectUnit").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });

            $(function() {

                $.ajax({
                    url: "{{ route('jadwal-peminjaman.index') }}",
                    type: "GET",
                    dataType: 'json',
                    success: callback,
                });

                $('#selectUnit').on('change', function() {
                    var idUnit = this.value;
                    $.ajax({
                        url: "{{ route('jadwal-peminjaman.index') }}",
                        type: "GET",
                        dataType: 'json',
                        data: {
                            fasilitas: idUnit,
                        },
                        success: callback,
                    });
                });

                function callback(response) {

                    $("#calendar").empty();

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