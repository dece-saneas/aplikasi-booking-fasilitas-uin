<x-layouts>
    <x-slot name="title">Daftar Pinjam</x-slot>

    <x-slot name="style"></x-slot>

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-0"><strong>DAFTAR PINJAM</strong></h4>
                </div>
                @role('Mahasiswa')
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('jadwal-peminjaman.create') }}" class="btn btn-sm btn-primary mb-2 mb-md-0"><i class="fas fa-pen-alt mr-2"></i>Ajukan Peminjaman</a>
                </div>
                @endrole
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%" class="text-center">Kode Peminjaman</th>
                        <th width="40%">Acara</th>
                        <th width="25%">Penyelenggara</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($events) !== 0)
                    @foreach($events as $key => $event)
                    <tr>
                        <td class="align-middle">{{ $key+1+((($histories->currentPage()-1)*10)) }}</td>
                        <td class="align-middle text-center"><strong>{{ $event->code }}</strong></td>
                        <td class="align-middle"><strong>{{ $event->title }}</strong> <br> <small>{{ $event->start->format('d F Y H:i') }} s.d {{ $event->end->format('d F Y H:i') }}</small></td>
                        <td class="align-middle">{{ $event->user->name }} <br> <small>{{ $event->user->faculty }}</small></td>
                        <td class="align-middle text-center"><span class="badge @if($event->status == 'Waiting') badge-warning @elseif($event->status == 'Rejected') badge-danger @elseif($event->status == 'Approved') badge-success @endif">{{ $event->status }}</span></td>
                        <td class="text-center align-middle">
                            <a class="dropdown-item text-muted" href="{{  route('jadwal-peminjaman.show', $event->id) }}"><i class="fas fa-eye mr-2"></i>Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-italic text-muted">Tidak ada data peminjaman</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if($events->hasPages())
        <div class="card-body">
            {{ $events->links('layouts.pagination') }}
        </div>
        @endif
    </div>

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="m-0"><strong>HISTORY</strong></h4>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%" class="text-center">Kode Peminjaman</th>
                        <th width="40%">Acara</th>
                        <th width="25%">Penyelenggara</th>
                        <th width="10%" class="text-center">Status</th>
                        <th width="5%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($histories) !== 0)
                    @foreach($histories as $key => $history)
                    <tr>
                        <td class="align-middle">{{ $key+1+((($events->currentPage()-1)*10)) }}</td>
                        <td class="align-middle text-center"><strong>{{ $history->code }}</strong></td>
                        <td class="align-middle"><strong>{{ $history->title }}</strong> <br> <small>{{ $history->start->format('d F Y H:i') }} s.d {{ $history->end->format('d F Y H:i') }}</small></td>
                        <td class="align-middle">{{ $history->user->name }} <br> <small>{{ $history->user->faculty }}</small></td>
                        <td class="align-middle text-center"><span class="badge @if($history->status == 'Waiting') badge-warning @elseif($history->status == 'Rejected') badge-danger @elseif($history->status == 'Approved') badge-success @endif">{{ $history->status }}</span></td>
                        <td class="text-center align-middle">
                            <a class="dropdown-item text-muted" href="{{  route('jadwal-peminjaman.show', $history->id) }}"><i class="fas fa-eye mr-2"></i>Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center font-italic text-muted">Tidak ada data peminjaman</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if($histories->hasPages())
        <div class="card-body">
            {{ $histories->links('layouts.pagination') }}
        </div>
        @endif
    </div>
    <x-slot name="script"></x-slot>
</x-layouts>