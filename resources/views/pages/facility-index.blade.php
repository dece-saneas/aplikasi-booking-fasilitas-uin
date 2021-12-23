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
                    <button class="btn btn-sm btn-primary mr-md-2 mb-2 m-md-0">Pengaturan Fasilitas</button>
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

    <x-slot name="script"></x-slot>

</x-layouts>