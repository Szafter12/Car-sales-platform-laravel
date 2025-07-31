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

    {{ $slot }}
    <x-layouts.footer />
</x-base-layout>
