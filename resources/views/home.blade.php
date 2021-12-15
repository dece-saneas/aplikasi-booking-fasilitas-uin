<x-layouts>
    <x-slot name="title">Home</x-slot>

    <x-slot name="style"></x-slot>

    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 pr-4">
                    <h5 class="mb-0">UNIVERSITAS ISLAM NEGERI</h5>
                    <h4 class="mb-4"><strong>SYARIF HIDAYATULLAH JAKARTA</strong></h4>
                    <h6 class="mb-4">Universitas Islam Negeri Syarif Hidayatullah Jakarta atau UIN Jakarta ( Sebelumnya bernama IAIN Syarif Hidayatullah atau IAIN )</h6>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted">
                        Jl. Ir H. Juanda No.95, Cemp. Putih, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15412, 6°18'23.8"S 106°45'16.4"E
                    </p>
                    <strong><i class="fas fa-globe-asia mr-1"></i> Website</strong>
                    <p class="text-muted"><a href="">www.uinjkt.ac.id</a></p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('img/uin-signage.jpg') }}" alt="uin-signage.jpg" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script"></x-slot>
</x-layouts>