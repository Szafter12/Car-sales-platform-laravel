@props(['title' => '', 'footerLinks' => '', 'bodyClass' => ''])

<x-base-layout :$title :$bodyClass>
    <x-layouts.header />

    @session('success')
        <div class="container my-large">
            <div class="success-message">
                {{ session('success') }}
            </div>
        </div>
    @endsession
    
    <main class="main-content">
        {{ $slot }}
    </main>
    <div class="message-box message-box--success">
        <p class="message-body fs-5"></p>
    </div>
    <x-layouts.footer />
</x-base-layout>
