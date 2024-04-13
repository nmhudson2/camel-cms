<!-- Welcome to Your Themes index file. This is the root file for this theme, and is 
where content will be propogated. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}}&nbsp; &#x2022; &nbsp; {{ucfirst($page_meta['name'])}}</title>
    <base href="{{env('APP_URL')}}" />
    <link rel="stylesheet" href="{{asset('includes/themes/'.env('ACTIVE_THEME','guru').'/assets/css/index.css')}}">
    <script src='{{asset('includes/themes/'.env('ACTIVE_THEME','guru').'/assets/js/index.js')}}'></script>

    <!-- Google Fonts - Nato Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- End Google Fonts -->
</head>

<body>
    <x-nav />

    <!-- 
        Lorem Ipsum Text Generated from: https://www.lipsum.com/
    -->
    @php
    $blocks = json_decode($content,true)['content']
    @endphp
    <main>
        @foreach($blocks as $block)
        @switch($block['type'])
        @case('h-big')
        <x-header-large class="{{$block['ClassList']}}" id="{{$block['idList']}}">
            <x-slot name="content">
                {{$block['text']}}
            </x-slot>
        </x-header-large>
        @break
        @case('h-small')
        <x-header-small class="{{$block['ClassList']}}" id="{{$block['idList']}}">
            <x-slot name="content">
                {{$block['text']}}
            </x-slot>
        </x-header-small>
        @break
        @case('paragraph')
        <x-paragraph class="{{$block['ClassList']}}" id="{{$block['idList']}}">
            <x-slot name="content">
                {{$block['text']}}
            </x-slot>
        </x-paragraph>
        @break
        @endswitch
        @endforeach
    </main>

</html>