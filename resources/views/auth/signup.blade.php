<x-guest-layout title="Signup" bodyClass="page-signup">
    <form action="" method="post">
        <div class="form-group">
            <input type="email" placeholder="Your Email" />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Your Password" />
        </div>
        <div class="form-group">
            <input type="password" placeholder="Repeat Password" />
        </div>
        <hr />
        <div class="form-group">
            <input type="text" placeholder="First Name" />
        </div>
        <div class="form-group">
            <input type="text" placeholder="Last Name" />
        </div>
        <div class="form-group">
            <input type="text" placeholder="Phone" />
        </div>
        <button class="btn btn-primary btn-login w-full">Signup</button>
    </form>

    <x-slot:footerLinks>
        <div class="login-text-dont-have-account">
            You already have account ?
            <a href="/signup.html">Login</a>
        </div>
    </x-slot:footerLinks>
</x-guest-layout>
