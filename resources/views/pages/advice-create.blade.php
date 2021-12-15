<x-layouts>
    <x-slot name="title">Saran</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    </x-slot>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title"><i class="far fa-comment-alt mr-2"></i>Saran</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('saran.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Alamat Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" id="email" name="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">Unit Fasilitas</label>
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>Fasilitas</label>
                                <select class="select @error('unit') is-invalid @enderror" id="select-facility" style="width: 100%;">
                                    <option></option>
                                    @foreach($facilities as $facility)
                                    <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
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
                </div>
                <div class="form-group row mb-4">
                    <label for="email" class="col-sm-4 col-form-label">Saran</label>
                    <div class="col-sm-8">
                        <textarea id="summernote" name="advice"></textarea>
                        @error('advice')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group justify-content-end">
                    <div class="offset-sm-4 col-sm-8">
                        <button class="btn btn-primary px-4">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                $('.select').select2({
                    placeholder: "Pilih",
                    allowClear: true
                })

                $('#summernote').summernote({
                    height: 100,
                })

                // Fetch Unit
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
            })
        </script>
    </x-slot>

</x-layouts>