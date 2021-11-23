<x-layouts>
    <x-slot name="title">Home</x-slot>

    <x-slot name="style"></x-slot>

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
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner rounded">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/photo1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/photo1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/photo1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/photo1.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" role="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" role="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <x-slot name="script"></x-slot>
</x-layouts>