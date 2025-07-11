<div
    class="d-flex justify-content-center p-0 align-items-center gap-3 bg-white rounded shadow text-secondary flex-column flex-md-row">

    <div class="p-4 w-100 w-md-50">

        <div>
            <div class="text-center fs-1 fw-bold mb-2 secondary">
                login
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-3" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-forms.input-with-icon type="email" name="email" placeholder="Email" icon-src="/images/username-icon.svg"
                icon-alt="Username icon" :value="old('email')" required autofocus autocomplete="username" mb-class="mb-3" />
            @error('email')
                <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror


            <x-forms.input-with-icon type="password" name="password" placeholder="Password"
                icon-src="/images/password-icon.svg" icon-alt="Password icon" required autocomplete="current-password"
                mb-class="mb-3" />
            @error('password')
                <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror


            <div class="form-check mb-3">
                <input class="form-check-input bg-secondary" type="checkbox" name="remember" id="remember_me">
                <label class="form-check-label text-sm text-gray-600" for="remember_me">
                    {{ __('Recuérdame') }}
                </label>
            </div>

            <div class="text-center mt-4 mb-4">

                <x-danger-button type="submit" class="bg-danger text-white">
                    {{ __('Iniciar Sesión') }}
                </x-danger-button>
            </div>


            <div class="text-center">
                <div class="fs-7 mb-2">
                    {{ __('No tienes una cuenta?') }}
                </div>
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    {{ __('Registrarse') }}
                </a>
            </div>

        </form>
    </div>

    <div class="d-none d-md-flex justify-content-center align-items-center p-0 w-md-50">
        <img class="shadow text-secondary img-fluid rounded" src="/images/logo.webp.png" alt="Imagen del logo"
            style="height: auto; max-width: 28rem;">
    </div>
</div>
