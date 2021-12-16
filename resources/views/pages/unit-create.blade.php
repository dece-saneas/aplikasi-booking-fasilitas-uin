<x-layouts>
    <x-slot name="title">Tambah Unit Fasilitas</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    </x-slot>

    <div class="card card-default">
        <div class="card-header text-center">
            <h4 class="m-0"><strong>Tambah Unit Fasilitas</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-8">
                        <label>Pilih Fasilitas</label>
                        <select class="select @error('facility_id') is-invalid @enderror" id="select-facility" style="width: 100%;" name="facility_id">
                            <option></option>
                            @foreach($facilities as $facility)
                            <option value="{{ $facility->id }}">{{ $facility->name }}</option>
                            @endforeach
                        </select>
                        @error('facility_id')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Photo Unit</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('photo')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Nama Unit</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Keterangan</label>
                    <textarea class="@error('description') is-invalid @enderror" id="summernote" name="description"></textarea>
                    @error('description')
                    <small class="form-text text-danger m-0">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-plus mr-2"></i>Tambah</button>
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
                    height: 200,
                })
            })
        </script>
    </x-slot>

</x-layouts>