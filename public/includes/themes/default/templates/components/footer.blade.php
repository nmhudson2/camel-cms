<div class='footer'>
    <ul class="flex flex-row width-full">
        @if(env('SITE_LOGO_NAME'))
        <li>
            <img class='logo' src="{{asset(env('SITE_LOGO_PATH'))}}" alt="Site Logo">
        </li>
        @endif
        <li><a href="{{url('/homepage')}}">Home</a></li>
        <li><a href="{{url('/about')}}">About</a></li>
        <li><a href="{{url('/policy')}}">Policies</a></li>
    </ul>
</div>