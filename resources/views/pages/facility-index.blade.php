<x-layouts>
    <x-slot name="title">Fasilitas</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    </x-slot>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                    <label>Fasilitas</label>
                    <select class="select @error('unit') is-invalid @enderror" id="select-facility" style="width: 100%;">
                        <option></option>
                        @foreach($facilities as $facility)
                        <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Unit</label>
                    <select class="select @error('facility_unit_id') is-invalid @enderror" id="select-unit" style="width: 100%;" name="facility_unit_id">
                        <option></option>
                    </select>
                    @error('facility_unit_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-body unit-show d-none">
            <div class="row">
                <div class="col-md-5">
                    <img alt="image" class="w-100 rounded" id="unit-photo">
                </div>
                <div class="col-md-7 px-4">
                    <h2 class="mb-4" id="unit-title"></h2>
                    <p id="unit-desc"></p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                $('.select').select2({
                    placeholder: "Pilih",
                    allowClear: true
                })

                // Fetch Units
                $('#select-facility').on('change', function() {
                    var idFacility = this.value;
                    $("#select-unit").html('');
                    $.ajax({
                        url: "{{ route('api.fetch-units') }}",
                        type: "POST",
                        data: {
                            facility_id: idFacility,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $('#select-unit').html('<option></option>');
                            $.each(result.units, function(key, value) {
                                $("#select-unit").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                });

                // Fetch Unit
                $('#select-unit').on('change', function() {
                    $(".unit-show").addClass("d-none");
                    var idUnit = this.value;
                    $.ajax({
                        url: "{{ route('api.fetch-data-unit') }}",
                        type: "POST",
                        data: {
                            unit_id: idUnit,
                            _token: '{{csrf_token()}}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $(".unit-show").removeClass("d-none");
                            $('#unit-title').text(result.unit.name);
                            $('#unit-desc').text(result.unit.description);
                            $('#unit-photo').attr("src", '{{ asset("img/facilities") }}/' + result.unit.photo);
                        }
                    });
                });
            })
        </script>
    </x-slot>

</x-layouts>