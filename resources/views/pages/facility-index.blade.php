<x-layouts>
    <x-slot name="title">Fasilitas</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    </x-slot>

    @role('Pengurus')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-right">
                    <h3 class="card-title">Daftar Fasilitas</h3>
                    <a href="{{ route('fasilitas.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-2"></i>Tambah</a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th>Nama</th>
                                <th class="text-center" style="width: 40px"><i class="fas fa-ellipsis-v"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($facilities as $key => $facility)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td>{{ $facility->name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('fasilitas.destroy', $facility->id) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-light"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="input-group">
                        <select class="custom-select select" id="select-facility-create-unit">
                            @foreach($facilities as $facility)
                            <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a href="javascript:void(0);" class="btn btn-primary btn-create-unit"><i class="fas fa-plus mr-2"></i>Tambah Unit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th>Nama</th>
                                <th class="text-center" style="width: 40px"><i class="fas fa-ellipsis-v"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($units as $key => $unit)
                            <tr>
                                <td class="align-middle text-center">{{ $key+1 }}</td>
                                <td class="align-middle">{{ $unit->name }} <br> <small>{{ $unit->facility->name }}</small></td>
                                <td class="align-middle text-center">
                                    <form action="{{ route('fasilitas.unit.destroy', [$unit->facility_id, $unit->id]) }}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-light"><i class="fas fa-edit"></i></button>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @else

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
                    <img class="w-100 rounded" id="unit-photo">
                </div>
                <div class="col-md-7 px-4">
                    <h2 class="mb-4" id="unit-title"></h2>
                    <p id="unit-desc"></p>
                </div>
            </div>
        </div>
    </div>
    @endrole

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
                            $('#unit-photo').attr("alt", result.unit.photo);
                        }
                    });
                });

                // create unit
                $('.btn-create-unit').on('click', function() {
                    var facilityID = $('#select-facility-create-unit').val();

                    var url = '{{route("fasilitas.unit.create", ":id")}}';
                    url = url.replace(':id', facilityID);
                    window.location.href=url;
                });
            })
        </script>
    </x-slot>

</x-layouts>