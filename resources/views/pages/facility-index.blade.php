<x-layouts>
    <x-slot name="title">Fasilitas</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    </x-slot>

    @role('Admin')
    <div class="modal fade" id="facilityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="m-0"><strong>Pengaturan Fasilitas</strong></h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('fasilitas.index') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @else Tambah Fasilitas @enderror" id="name" name="name">
                            <div class="input-group-append">
                                <button type="submit" class="btn @error('name') btn-danger @else btn-primary @enderror">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive p-0" style="max-height: 300px; border: 2px solid #dee2e6;">
                        <table class="table table-head-fixed my-0">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th class="text-center" width="10%">Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($facilities) !== 0)
                                @foreach($facilities as $key => $facility)
                                <tr>
                                    <td class="align-middle">{{ $key+1 }}</td>
                                    <td class="align-middle">{{ $facility->name }}</td>
                                    <td class="text-center align-middle">
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-dismiss="modal" href="#editFacilityModal" data-name="{{ $facility->name }}" data-url="{{ route('fasilitas.update', $facility->id) }}"><i class="fas fa-edit"></i></button>
                                            <form action="{{  route('fasilitas.destroy', $facility->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3" class="text-center font-italic text-muted">Tidak ada data fasilitas</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editFacilityModal" tabindex="-1" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-1 pr-2" style="border:none;">
                    <button type="button" class="close" data-dismiss="modal" data-toggle="modal" href="#facilityModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center pt-0">
                    <h5 class="m-0"><strong>Edit Nama Fasilitas</strong></h5>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);" id="editFacilityForm" method="POST">
                        @csrf @method('PUT')
                        <div class="input-group mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @else Tambah Fasilitas @enderror" id="name" name="name">
                            <div class="input-group-append">
                                <button type="submit" id="saveEditBtn" class="btn @error('name') btn-danger @else btn-primary @enderror">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-0"><strong>Fasilitas</strong></h4>
                </div>
                <div class="col-md-6 text-md-right">
                    <button type="button" class="btn btn-sm btn-primary mr-md-2 mb-2 m-md-0" data-toggle="modal" href="#facilityModal">Pengaturan Fasilitas</button>
                    <a href="{{ route('units.create') }}" class="btn btn-sm btn-primary mb-2 mb-md-0"><i class="fas fa-plus mr-2"></i>Tambah Unit</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%" class="text-center">Foto</th>
                        <th>Fasilitas</th>
                        <th>Unit</th>
                        <th class="text-center">Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($units) !== 0)
                    @foreach($units as $key => $unit)
                    <tr>
                        <td class="align-middle">{{ $key+1+((($units->currentPage()-1)*10)) }}</td>
                        <td>
                            <img class="img-fluid img-thumbnail" src="{{ asset('img/facilities/'.$unit->photo) }}" alt="unit-photo" onerror="this.src='img/photo-placeholder.jpg'">
                        </td>
                        <td class="align-middle">{{ $unit->facility->name }}</td>
                        <td class="align-middle">{{ $unit->name }}</td>
                        <td class="text-center align-middle">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">Atur</button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-muted" href="{{  route('units.edit', $unit->id) }}"><i class="fas fa-edit mr-2"></i>Edit</a>
                                    <form action="{{ route('units.destroy',$unit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-muted"><i class="fas fa-trash-alt mr-2"></i>Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-italic text-muted">Tidak ada data unit</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if($units->hasPages())
        <div class="card-body">
            {{ $units->links('layouts.pagination') }}
        </div>
        @endif
    </div>
    @endrole

    @if(Auth::guest() || Auth::user()->hasAnyRole(['Mahasiswa', 'Pengurus']))
    <div class="row">
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header text-center" style="border: none;">
                    <h4 class="m-0"><strong>Fasilitas</strong></h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Fasilitas</label>
                            <select class="form-control select" id="selectFacility" width="100%">
                                <option></option>
                                @foreach($facilities as $facility)
                                <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Pilih Unit</label>
                            <select class="form-control select" id="selectUnit" width="100%">
                                <option></option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-body">
                    <img src="{{ asset('img/facilities/'.$units[0]->photo) }}" alt="photo-unit" class="img-fluid rounded" id="photoUnit">
                    <div class="my-4">
                        <h4 class="m-0"><strong id="unitName">{{ $units[0]->name }}</strong></h4>
                        <h6 class="m-0" id="unitFacilityName">{{ $units[0]->facility->name }}</h6>
                    </div>
                    <div class="description" id="unitDescription">
                        {!! $units[0]->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <x-slot name="script">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
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

                // Fetch Unit
                $('#selectUnit').on('change', function() {
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
                            $('#unitName').text(result.unit.name);
                            $('#unitFacilityName').text(result.facility.name);
                            $('#unitDescription').html(result.unit.description);
                            $('#photoUnit').attr("src", '{{ asset("img/facilities") }}/' + result.unit.photo);
                        }
                    });
                });
            });
        </script>
        @role('Admin')
        <script>
            $('#editFacilityModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var name = button.data('name')
                var url = button.data('url')

                var modal = $(this)
                modal.find('#editFacilityForm').attr('action', url)
                modal.find('#name').val(name)
            })
        </script>
        @endrole
    </x-slot>

</x-layouts>