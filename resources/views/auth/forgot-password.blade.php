<x-guest-layout title="Forgot password" bodyClass="page-login" :socialAuth="false">
    <div class="my-5">
        <h1 class="auth-page-title fs-3 mb-2">Request Password Reset</h1>
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="form-group @error('email')
                has-error
            @enderror">
                <input type="email" placeholder="Your Email" name="email" />
                <p class="error-message">{{ $errors->first('email') }}</p>
            </div>

            <button class="btn btn-primary btn-login w-full">
                Request password reset
            </button>

            <div class="login-text-dont-have-account">
                Already have an account? -
                <a href="{{ route('login') }}"> Click here to login </a>
            </div>
        </form>
    </div>

</x-guest-layout>
