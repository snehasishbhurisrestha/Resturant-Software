<x-guest-layout>

<x-auth-session-status class="mb-4" :status="session('status')" />

<form class="app-form" method="POST" action="{{ route('login') }}">
@csrf

<div class="d-flex flex-column justify-content-between">

    {{-- <div class="mb-5 text-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.svg') }}" class="img-fluid" alt="Logo">
        </a>
    </div> --}}

    <div>

        <div class="mb-4 text-center">
            <h3 class="mb-2 text-white" style="color: #ffffff !important;">Hi, Welcome Back !!!</h3>
            <p class="mb-0 text-white" style="color: #ffffff !important;">Please enter your credentials to sign in!</p>
        </div>

        <!-- Email -->
        {{-- <div class="mb-3">
            <label class="form-label text-white">Email <span class="text-danger">*</span></label>

            <input 
                type="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                required
                autofocus
            >

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label class="form-label text-white" style="color: #ffffff !important;">
                Email or Phone <span class="text-danger">*</span>
            </label>

            <input 
                type="text"
                name="login"
                class="form-control"
                value="{{ old('login') }}"
                placeholder="Enter email or phone"
                required
                autofocus
            >

            @error('login')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label class="form-label text-white" style="color: #ffffff !important;">Password <span class="text-danger">*</span></label>

            <div class="input-group input-group-flat pass-group">
                <input 
                    type="password"
                    name="password"
                    class="form-control pass-input"
                    placeholder="Enter password"
                    required
                >

                <span class="input-group-text toggle-password">
                    <i class="icon-eye-off"></i>
                </span>
            </div>

            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Remember + Forgot -->
        <div class="d-flex align-items-center justify-content-between mb-4">

            <div class="form-check form-check-md mb-0">
                <input 
                    class="form-check-input"
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                >

                <label for="remember_me" class="form-check-label text-white mt-0" style="color: #ffffff !important;">
                    Remember Me
                </label>
            </div>

            {{-- <div class="text-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="link-primary">
                        Forgot Password?
                    </a>
                @endif
            </div> --}}

        </div>

        <!-- Submit -->
        <div class="mb-4">
            <button type="submit" class="btn btn-primary w-100">
                Sign In
            </button>
        </div>

        <!-- Register -->
        {{-- <div class="text-center mt-4">
            <p class="fw-normal mb-0">
                Don't have an account?

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="link-primary">
                        Sign Up
                    </a>
                @endif
            </p>
        </div> --}}

    </div>

</div>

</form>

</x-guest-layout>