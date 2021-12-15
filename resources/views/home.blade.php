<x-layouts>
    <x-slot name="title">Home</x-slot>

    <x-slot name="style"></x-slot>

    <div class="card card-default">
        <div class="card-body">
            <div class="row">
                <div class="col-md-7 pr-4">
                    <h5 class="mb-0">UNIVERSITAS ISLAM NEGERI</h5>
                    <h4 class="mb-2"><strong>SYARIF HIDAYATULLAH JAKARTA</strong></h4>

                    <h6 class="mb-0">Universitas Islam Negeri Syarif Hidayatullah Jakarta atau UIN Jakarta</h6>
                    <p class="mb-4">( Sebelumnya bernama IAIN Syarif Hidayatullah atau IAIN )</p>
                    <hr>

                    <span class="mb-0"><strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong></span>
                    <p class="text-muted"><a href="https://www.google.com/maps/place/-6.306611,106.754556">Jl. Ir H. Juanda No.95, Cemp. Putih, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15412</a></p>

                    <span class="mb-0"><strong><i class="fas fa-globe-asia mr-1"></i> Website</strong></span>
                    <p class="text-muted"><a href="https://www.uinjkt.ac.id">www.uinjkt.ac.id</a></p>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('img/uin-signage.jpg') }}" alt="uin-signage.jpg" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script"></x-slot>
</x-layouts>