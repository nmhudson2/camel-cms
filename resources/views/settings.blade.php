<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings ') }}
        </h2>
    </x-slot>
    <x-camel_cms.dashboard.site-settings :$templates />



</x-app-layout>