<x-layouts>
    <x-slot name="title">Jadwal Peminjaman</x-slot>

    <x-slot name="style"></x-slot>

    <!-- Modal -->
    <div class="modal fade" id="actionModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h6 id="modalText"></h6>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Close</button>
                    <form action="{{ route('jadwal-peminjaman.update', $event->id) }}" method="POST" id="modalAction">
                        @csrf @method('PUT')
                        <button class="btn btn-sm btn-primary" name="type" id="modalSubmit">Lanjutkan<i class="fas fa-arrow-right ml-2"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h2><strong>{{ $event->title }}</strong></h2>
                    <h6>
                        <span class="badge @if($event->status == 'Waiting') badge-warning @elseif($event->status == 'Rejected') badge-danger @elseif($event->status == 'Approved') badge-success @endif">{{ $event->code }}</span>
                        <span class="badge badge-dark">{{ $event->type }}</span>
                    </h6>
                </div>
                <div class="col text-right">
                    <h5 class="mt-2"><strong>{{ $event->unit->facility->name }} / {{ $event->unit->name }}</strong></h5>
                    <h6>{{ $event->start->format('d F Y H:i') }} s.d {{ $event->end->format('d F Y H:i') }}</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! $event->description !!}
            <div class="my-4">
                <a href="{{ asset('files') }}/{{ $event->ktm }}" class="btn btn-sm btn-default" download><i class="fas fa-download mr-2"></i>KTM</a>
                <a href="{{ asset('files') }}/{{ $event->lampiran }}" class="btn btn-sm btn-default" download><i class="fas fa-download mr-2"></i>Lampiran Acara</a>
                <a href="{{ asset('files') }}/{{ $event->rundown }}" class="btn btn-sm btn-default" download><i class="fas fa-download mr-2"></i>Rundown Acara</a>
            </div>
            <h6>Penyelenggara Acara :</h6>
            <h5><strong>{{ $event->user->name }}</strong></h5>
            <h6>{{ $event->user->faculty }}</h6>
        </div>
        @role('Pengurus')
        <div class="card-footer row">
            @if( $event->status == "Waiting")
            <div class="col">
                <div class="btn-group btn-group-sm" role="group">
                    <button class="btn btn-success" data-toggle="modal" data-target="#actionModal" data-value="1" data-text="Aksi ini tidak dapat di batalkan, Izinkan acara ini ?"><i class="fas fa-check mr-2"></i>Izinkan</button>
                    <button class="btn btn-default" data-toggle="modal" data-target="#actionModal" data-value="0" data-text="Aksi ini tidak dapat di batalkan, Tolak Izin untuk acara ini ?"><i class="fas fa-times mr-2"></i>Tidak di Izinkan</button>
                </div>
            </div>
            @endif
            <div class="col text-right">
                <a href="{{ route('download', $event->id) }}" class="btn btn-primary"><i class="fas fa-file-download mr-2"></i>Download</a>
            </div>
        </div>
        @endrole
    </div>

    <x-slot name="script">
        <script>
            $('#actionModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var text = button.data('text')
                var value = button.data('value')

                var modal = $(this)
                modal.find('#modalText').text(text)
                modal.find('#modalSubmit').attr('value', value)
            })
        </script>
    </x-slot>
</x-layouts>