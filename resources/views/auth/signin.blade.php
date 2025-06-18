<x-guest-layout title="Login" bodyClass="page-login">
    <h1 class="my-3 text-center fs-2">Sign in</h1>
    {{ session('error') }}
    <main>
        <form action="{{ route('login.store') }}" method="POST" class="mt-5">
            @csrf
            <div class="form-group @error('email') has-error @enderror">
                <input type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" />
                <p class="error-message">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <input type="password" placeholder="Your Password" name="password" />
                <p class="error-message">{{ $errors->first('password') }}</p>
            </div>
            <div class="text-right mb-medium">
                <a href="{{ route('password.request') }}" class="auth-page-password-reset">Forgot password?</a>
            </div>
            <button class="btn btn-primary btn-login w-full">Login</button>
        </form>
    </main>
    <x-slot:footerLink>
        <div class="login-text-dont-have-account">
            You don't have account ?
            <a href="{{ route('signup') }}">Signup for free</a>
        </div>
    </x-slot:footerLink>
</x-guest-layout>
