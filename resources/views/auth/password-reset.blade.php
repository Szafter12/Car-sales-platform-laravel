<x-guest-layout title="Forgot password" bodyClass="page-login" :socialAuth="false">
    <div class="my-5">
        <h1 class="auth-page-title fs-3 mb-2">Reset password</h1>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ request('token') }}">
            <div class="form-group @error('email')
                has-error
            @enderror">
                <input type="email" readonly name="email" value="{{ request('email') }}">
                <p class="error-message">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group @error('password')
                has-error
            @enderror">
                <input type="password" placeholder="New password" name="password" />
                <p class="error-message">{{ $errors->first('password') }}</p>
            </div>

            <div class="form-group">
                <input type="password" placeholder="Repeat password" name="password_confirmation" />
            </div>

            <button class="btn btn-primary btn-login w-full">
                Reset password
            </button>
        </form>
    </div>

</x-guest-layout>
