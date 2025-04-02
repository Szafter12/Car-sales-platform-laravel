<x-guest-layout title="Login" bodyClass="page-login">
    <form action="" method="post">
        <div class="form-group">
            <input type="email" placeholder="Your Email" />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Your Password" />
        </div>
        <div class="text-right mb-medium">
            <a href="/password-reset.html" class="auth-page-password-reset">Reset Password</a>
        </div>
        <button class="btn btn-primary btn-login w-full">Login</button>
    </form>

    <x-slot:footerLink>
        <div class="login-text-dont-have-account">
            You don't have account ?
            <a href="/signup.html">Signup for free</a>
        </div>
    </x-slot:footerLink>
</x-guest-layout>
