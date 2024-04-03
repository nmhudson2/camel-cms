<form action="">
    <input type="text" value="{{env('APP_NAME')}}">
    <input type="text" name="" id="" value="{{env('APP_ENV')}}">
    <select name="" id="">
        @foreach($templates as $key=>$value)
        <option value="{{$value}}">{{$value}}</option>
        @endforeach
    </select>
</form>