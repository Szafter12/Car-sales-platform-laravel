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

    @session('warning')
        <div class="container my-large">
            <div class="success-message bg-warning">
                {{ session('warning') }}
            </div>
        </div>
    @endsession

    <main class="main-content">
        {{ $slot }}
    </main>
    <div class="message-box-container">

    </div>
    <x-layouts.footer />
</x-base-layout>
