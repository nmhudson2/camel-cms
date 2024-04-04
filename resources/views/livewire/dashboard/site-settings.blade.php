<form action="" class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex flex-col h-screen">

    <div class="flex flex-row gap-10">
        <x-section-title>
            <x-slot name="title">Change App Name</x-slot>
            <x-slot name="description">Change how your apps name appears on tabs</x-slot>
        </x-section-title>
        <div class="mt-5 mb-5 p-5 align-right md:mt-0 md:col-span-2 bg-white rounded ">
            <x-label for="app_name">App Name</x-label>
            <x-input type="text" value="{{env('APP_NAME')}}" name="app_name" />
        </div>
    </div>
    <div class="mt-5 mb-5 p-5 align-right md:mt-0 md:col-span-2 bg-white rounded ">
        <x-label for="app_env">Environment Level</x-label>
        <x-input type="text" name="app_env" id="" value="{{env('APP_ENV')}}" />
    </div>
    <div class="mt-5 mb-5 p-5 align-right md:mt-0 md:col-span-2 bg-white rounded ">
        <span>
            Set Active Theme
        </span>
        <span>
            <x-label for="active_theme">
                Active Theme
            </x-label>
            <select name="active_theme" id="">
                @foreach($templates as $key=>$value)
                <option value="{{$value}}" {{$value == 'default' ? 'selected': ''}}>{{$value}}</option>
                @endforeach
            </select>
        </span>
    </div>




</form>