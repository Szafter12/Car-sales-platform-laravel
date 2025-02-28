@props(['title' => '', 'footerLinks' => ''])
<x-base-layout :title="$title">
    <x-layout-ui.header />
    {{ $slot }}
</x-base-layout>
