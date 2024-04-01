<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Camel CMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class='flex flex-row py-10'>
            <form action="" method="{{$exists == 'true' ? 'PATCH': 'POST' }}" name="page_editor" class="w-[90%] m-auto bg-white flex flex-row rounded justify-between ">
                <div class="flex flex-col w-[300px] border-2 border-red-500">
                    @livewire('editor.toolbar')
                    <button type="submit" form='page_editor'>{{$exists=='true'?'Update':'Create Page'}}</button>
                </div>

                @livewire('editor.page-component-editor')
            </form>

        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>