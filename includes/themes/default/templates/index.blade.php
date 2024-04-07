<!-- Welcome to Your Themes index file. This is the root file for this theme, and is 
where content will be propogated. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env("APP_NAME")}}&nbsp; &#x2022; &nbsp; {{ucfirst($page_meta['name'])}}</title>
    <link rel="stylesheet" href="{{Storage::url('themes/'.env('ACTIVE_THEME','default').'/assets/css/index.css')}}">

</head>

<body>

    @php
    $blocks = json_decode($content,true)['content']
    @endphp
    @foreach($blocks as $block)
    @switch($block['type'])
    @case('h-big')
    <x-header-large>
        <x-slot name="content">
            {{$block['text']}}
        </x-slot>
    </x-header-large>
    @break
    @case('h-small')
    <x-header-small>
        <x-slot name="content">
            {{$block['text']}}
        </x-slot>
    </x-header-small>
    @break
    @case('paragraph')
    <x-paragraph>
        <x-slot name="content">
            {{$block['text']}}
        </x-slot>
    </x-paragraph>
    @break
    @endswitch
    @endforeach

</html>