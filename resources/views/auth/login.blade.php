<x-layouts.lobby>
    <x-slot name="title">Login</x-slot>

    <h4 class="login-box-msg">LOGIN</h4>

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="text" name="login" value="{{ old('login') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email / NIM / NIP" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </form>

</x-layouts.lobby>