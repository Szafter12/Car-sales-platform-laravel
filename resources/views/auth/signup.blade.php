<x-guest-layout title="Signup" bodyClass="page-signup">
    <h1 class="my-3 text-center fs-2">Sign up</h1>
    <main>
        <form action="{{ route('signup.store') }}" method="post">
            @csrf
            <div class="form-group @error('name') has-error @enderror">
                <input type="text" placeholder="Name" name="name" value="{{ old('name') }}" />
                <p class="error-message">{{ $errors->first('name') }}</p>
            </div>
            <div class="form-group @error('email') has-error @enderror">
                <input type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" />
                <p class="error-message">{{ $errors->first('email') }}</p>
            </div>
            <div class="form-group @error('phone') has-error @enderror">
                <input type="text" placeholder="Phone" name="phone" value="{{ old('phone') }}" />
                <p class="error-message">{{ $errors->first('phone') }}</p>
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <input type="password" placeholder="Your Password" name="password" />
                <p class="error-message">{{ $errors->first('password') }}</p>
            </div>
            <div class="form-group @error('password_confirmation') has-error @enderror">
                <input type="password" placeholder="Repeat Password" name="password_confirmation" />
                <p class="error-message">{{ $errors->first('password_confirmation') }}</p>
            </div>
            <button class="btn btn-primary btn-login w-full">Register</button>
        </form>
    </main>
    <x-slot:footerLink>
        Already have an account? -
        <a href="{{ route('login') }}"> Click here to login </a>
    </x-slot:footerLink>
</x-guest-layout>
