@extends('layouts.app')

@section('content')
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <pre>
    NAME:<input type="text" name="peoplename" /><br>
    ADDRESS:<input type="text" name="address"/><br>
    IMAGE:<input type="file" name="image"/><br>
    GYMID:<select name="gymid"><br>
            @foreach ($gyms as $gym)
    <option value="{{$gym->id}}">{{$gym->gymname}}</option>
            @endforeach        
    </select><br>
    DATE:<select name="date">
            <option value="1">1 month</option>
            <option value="3">3 month</option>
            <option value="6">6 month</option>
            <option value="12">12 month</option>
        </select>
    <input type="submit"/>
    </pre>
</form>

        @foreach ($peoples as $people)
                {{$people->name}}
                {{$people->address}}
                <img src="{{asset($people->image)}}" height="100px" width="100px">
                {{$people->gymid}}
                {{$people->joiningdate}}<br>

        @endforeach


@endsection