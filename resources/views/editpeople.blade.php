@extends('layouts.app')

@section('content')
<form action="/updatepeople/{{$peoples->id}}" method="post" enctype="multipart/form-data">
    @csrf
    <pre>
    NAME:<input type="text" name="peoplename" value="{{$peoples->name}}" /><br>
    ADDRESS:<input type="text" name="address" value="{{$peoples->address}}"/><br>
    IMAGE:<input type="file" name="image" /><br>
    <img src="{{asset($peoples->image)}}" height="100px" width="100px">
    DATE:<select name="date" >
            <option value="0">select option</option>
            <option value="1" >1 month</option>
            <option value="3" >3 month</option>
            <option value="6">6 month</option>
            <option value="12">12 month</option>
        </select><br>
    <input type="submit"/>
    </pre>
</form>
@endsection