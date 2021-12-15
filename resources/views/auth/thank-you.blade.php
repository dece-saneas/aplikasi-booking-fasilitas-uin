<x-layouts.lobby>
    <x-slot name="title">Terimakasih</x-slot>

    <h6 class="login-box-msg">Terimakasih sudah mengunjungi.</h6>

    <div class="row">
        <div class="col-6 text-center">
            <a href="{{ route('home') }}" class="btn btn-primary btn-block">Home</a>
        </div>
        <div class="col-6 text-center">
            <a href="{{ route('saran.create') }}" class="btn btn-primary btn-block">Saran</a>
        </div>
    </div>

</x-layouts.lobby>