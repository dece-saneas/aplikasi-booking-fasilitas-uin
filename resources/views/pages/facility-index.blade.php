<x-layouts>
    <x-slot name="title">Fasilitas</x-slot>

    <x-slot name="style"></x-slot>

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-0"><strong>Fasilitas</strong></h4>
                </div>
                <div class="col-md-6 text-md-right">
                    <button class="btn btn-sm btn-primary mr-2">Pengaturan Fasilitas</button>
                    <a href="{{ route('units.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Unit</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Fasilitas</th>
                        <th>Unit</th>
                        <th>Keterangan</th>
                        <th>Pengaturan</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($units) !== 0)
                    @foreach($units as $key => $unit)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $unit->photo }}</td>
                        <td>{{ $unit->facility->name }}</td>
                        <td>{{ $unit->name }}</td>
                        <td>{{ $unit->description }}</td>
                        <td><button class="btn btn-primary"></button>Edit</td>
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
    </div>

    <x-slot name="script"></x-slot>

</x-layouts>