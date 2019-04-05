@extends('layouts.app')

@section('content')
<form action="/people" method="post" enctype="multipart/form-data">
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
            <option value="0">select months</option>
            <option value="1">1 month</option>
            <option value="3">3 month</option>
            <option value="6">6 month</option>
            <option value="12">12 month</option>
        </select>
    <input type="submit"/>
    </pre>
</form>
<h1>get the list of the people who are late for fees <a href="/people/fee/{{$gymids}}">fee</a></h1>
<h1>get the list of all the people <a href="/people/all/{{$gymids}}">all</a></h1>
<table border="1" align="center">
        <tr>
                <td>name</td>
                <td>address</td>
                <td>image</td>
                <td>last fees date</td>
                <td>edit</td>
                <td>delete</td>
               
        </tr>
        @foreach ($peoples as $people)
                
                        <tr>
                                <td> {{$people->name}}</td>
                                <td> {{$people->address}}</td>
                                <td><img src="{{asset($people->image)}}" height="100px" width="100px"></td>
                                <td>{{$people->joiningdate}}</td>
                                <td><a href="/edit/{{$people->id}}">edit</a></td>
                                <td><a href="/deletepeople/{{$people->id}}">delete</a></td>                              
                        </tr>
                
                

        @endforeach
</table>

@endsection