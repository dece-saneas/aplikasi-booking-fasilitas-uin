<x-layouts>
    <x-slot name="title">Jadwal Peminjaman</x-slot>

    <x-slot name="style"></x-slot>

    <div class="card card-default">
        <div class="card-body">
            <h2 class="mb-0">{{ $event->title }}</h2>
            <h4>{{ $event->code }}</h4>
            <h6>{{ $event->status }}</h6>
            <br>
            <h4>Penyelenggara : {{ $event->user->name }}, Fakultas {{ $event->user->faculty }}</h4>
            <br>
            <h4>Lokasi : {{ $event->unit->facility->name }} / {{ $event->unit->name }}</h4>
            <br>
            <p>{{ $event->start }} - {{ $event->end }}</p>
            <p>Type : {{ $event->type }}</p>
            <br>
            <p>Preview KTM</p>
            <p>Preview Lampiran Acara</p>
            <p>Preview Rundown Acara</p>

            <button class="btn btn-sm btn-primary">Cetak</button>
        </div>
    </div>

    <x-slot name="script"></x-slot>
</x-layouts>