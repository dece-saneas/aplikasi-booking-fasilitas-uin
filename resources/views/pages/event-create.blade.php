<x-layouts>
    <x-slot name="title">Pengajuan Peminjaman</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    </x-slot>

    <div class="card card-default">
        <div class="card-header text-center">
            <h4 class="m-0"><strong>Form Peminjaman</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('jadwal-peminjaman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ Auth::user()->name }}" name="name" disabled>
                        @error('name')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="faculty">Fakultas</label>
                        <input type="text" class="form-control @error('faculty') is-invalid @enderror" id="faculty" value="{{ Auth::user()->faculty }}" name="faculty" disabled>
                        @error('faculty')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="title">Acara</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                        @error('title')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 @error('type') is-invalid @enderror">
                        <label for="type">Type</label>
                        <select class="select" id="type" style="width: 100%;" name="type">
                            <option></option>
                            <option value="Campus">Campus</option>
                            <option value="Public">Public</option>
                        </select>
                        @error('type')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6 @error('facility_unit_id') is-invalid @enderror">
                        <label>Pilih Fasilitas</label>
                        <select class="select" id="selectFacility" style="width: 100%;" name="facility_id">
                            <option></option>
                            @foreach($facilities as $facility)
                            <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 @error('facility_unit_id') is-invalid @enderror">
                        <label>Pilih Unit</label>
                        <select class="select" id="selectUnit" style="width: 100%;" name="facility_unit_id">
                            <option></option>
                        </select>
                        @error('facility_unit_id')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Deskripsi</label>
                    <textarea class="@error('description') is-invalid @enderror" id="summernote" name="description"></textarea>
                    @error('description')
                    <small class="form-text text-danger m-0">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Tanggal dan Waktu</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" id="eventtime" name="period">
                    </div>
                </div>
                <hr class="my-4">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>KTM</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="javascript:void(0);" class="btn btn-default @error('ktm') is-invalid @enderror"><i class="fas fa-file-download"></i></a>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('ktm') is-invalid @enderror" name="ktm" id="inputKTM">
                                <label class="custom-file-label" for="inputKTM">Choose file</label>
                            </div>
                        </div>
                        @error('ktm')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>Lampiran Acara</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="javascript:void(0);" class="btn btn-default @error('lampiran') is-invalid @enderror"><i class="fas fa-file-download"></i></a>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('lampiran') is-invalid @enderror" name="lampiran" id="inputLampiran">
                                <label class="custom-file-label" for="inputLampiran">Choose file</label>
                            </div>
                        </div>
                        @error('lampiran')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label>Rundown Acara</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="javascript:void(0);" class="btn btn-default @error('rundown') is-invalid @enderror"><i class="fas fa-file-download"></i></a>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('rundown') is-invalid @enderror" name="rundown" id="inputRundown">
                                <label class="custom-file-label" for="inputRundown">Choose file</label>
                            </div>
                        </div>
                        @error('rundown')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <p>Note : Petsyaratan <strong>WAJIB</strong> diisi dan <strong>FILE</strong> sudah ada persetujuan dan diizinkan dari pihak fakultas / sub bagian masing-masing. Sebelum melakukan pengajuan peminjaman harap baca terlebih dahulu peraturan !</p>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-paper-plane mr-2"></i>Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                $('.select').select2({
                    placeholder: "Pilih",
                    allowClear: true
                })

                $('#summernote').summernote({
                    height: 200,
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
                $('#eventtime').daterangepicker({
                    timePicker: true,
                    timePicker24Hour: true,
                    separator: '/',
                    locale: {
                        format: 'YYYY-MM-DD HH:mm:ss',
                        separator: ' s/d ',
                    }
                })
            })
        </script>
    </x-slot>
</x-layouts>