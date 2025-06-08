{{-- resources/views/components/auth/register-card.blade.php --}}

<div class="bg-white d-flex justify-content-center p-0 align-items-center gap-3 rounded shadow text-secondary flex-column-reverse flex-md-row">


    <div class="d-none d-md-flex justify-content-center align-items-center p-0 w-md-50">
        <img class="shadow text-secondary img-fluid rounded" src="/images/register-logo.png" alt="Imagen de registro"
            style="height: auto; max-width: 28rem;">
    </div>

    <div class="p-5 bg-white text-secondary w-100 w-md-50">
        <div>
            <div class="text-center fs-1 fw-bold mb-2 secondary">Register</div>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-forms.input-with-icon
                name="name"
                placeholder="Username"
                icon-src="/images/username-icon.svg"
                icon-alt="Username icon"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                mb-class="mb-3"
                icon-bg-class="bg-warning" />
            @error('name')
            <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror

            <x-forms.input-with-icon
                type="email"
                name="email"
                placeholder="Email"
                icon-src="/images/arroba.svg"
                icon-alt="Email icon"
                :value="old('email')"
                required
                autocomplete="username"
                mb-class="mb-3"
                icon-bg-class="bg-warning" />
            @error('email')
            <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror

            <x-forms.input-with-icon
                type="password"
                name="password"
                placeholder="Password"
                icon-src="/images/password-icon.svg"
                icon-alt="Password icon"
                required
                autocomplete="new-password"
                mb-class="mb-3"
                icon-bg-class="bg-warning" />
            @error('password')
            <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror

            <x-forms.input-with-icon
                type="password"
                name="password_confirmation"
                placeholder="Repeat password"
                icon-src="/images/password-icon.svg"
                icon-alt="Confirm Password icon"
                required
                autocomplete="new-password"
                mb-class="mb-3"
                icon-bg-class="bg-warning" />
            @error('password_confirmation')
            <div class="text-danger fs-7 mb-2">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end align-items-center mt-4">
                <a class="text-sm text-secondary hover:text-dark text-decoration-none me-3" href="{{ route('login') }}">
                    {{ __('Ya registrado?') }} {{-- "Already registered?" --}}
                </a>

                <x-danger-button type="submit">
                    {{ __('Registrarse') }}
                </x-danger-button>
            </div>
        </form>
    </div>
</div>