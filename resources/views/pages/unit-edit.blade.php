<x-layouts>
    <x-slot name="title">Edit Unit</x-slot>

    <x-slot name="style">
        <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    </x-slot>

    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('img/facilities/'.$unit->photo) }}" alt="unit-photo" class="img-fluid" id="imgView">
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header text-center">
            <h4 class="m-0"><strong>Edit Unit</strong></h4>
        </div>
        <div class="card-body">
            <form action="{{ route('units.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="form-group row">
                    <div class="col-md-8">
                        <label>Pilih Fasilitas</label>
                        <select class="select @error('facility_id') is-invalid @enderror" id="select-facility" style="width: 100%;" name="facility_id">
                            <option></option>
                            @foreach($facilities as $facility)
                            <option value="{{ $facility->id }}" @if($facility->id == $unit->facility_id) selected @endif>{{ $facility->name }}</option>
                            @endforeach
                        </select>
                        @error('facility_id')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Photo Unit</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#previewModal"><i class="fas fa-search-plus mr-2"></i>Preview</button>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" name="photo" id="inputPhoto">
                                <label class="custom-file-label" for="inputPhoto">Choose file</label>
                            </div>
                        </div>
                        @error('photo')
                        <small class="form-text text-danger m-0">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Nama Unit</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $unit->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Keterangan</label>
                    <textarea class="@error('description') is-invalid @enderror" id="summernote" name="description">{{ $unit->description }}</textarea>
                    @error('description')
                    <small class="form-text text-danger m-0">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save mr-2"></i>Simpan</button>
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

                $("#inputPhoto").change(function(event) {
                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        var filename = $("#inputPhoto").val();
                        filename = filename.substring(filename.lastIndexOf('\\') + 1);
                        reader.onload = function(e) {
                            debugger;
                            $('#imgView').attr('src', e.target.result);
                            $('#imgView').hide();
                            $('#imgView').fadeIn(500);
                            $('.custom-file-label').text(filename);
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            })
        </script>
    </x-slot>

</x-layouts>