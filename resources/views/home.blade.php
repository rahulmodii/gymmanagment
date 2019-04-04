@extends('layouts.app')

@section('content')
<h1>Create gym form </h1>
<form action="/creategym" method="post">
@csrf
<input type="text" name="gymname" />
<input type="text" name="location"/>
<input type="text" name="details"/>
<input type="submit"/>
</form>
<a href="/restore">restore</a>
<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Gymname</th>
            <th>Location</th>
            <th>Details</th>
            <th>Update</th>
            <th>delete</th>
            
        </tr>
    </thead>
    <tbody>
            @if(!$gyms->isEmpty())
            @foreach ($gyms as $gym)
            <tr>
            <td>{{$gym->gymname}}</td>
            <td>{{$gym->location}}</td>
            <td>{{$gym->details}}</td>
            <td><a href="/edit/{{$gym->id}}">update</a></td>
            <td><a href="/deletegym/{{$gym->id}}">delete</a></td>
            <td><a href="/people/{{$gym->id}}/all">view people</a></td>        
                </tr> 
            @endforeach
            @else
            You dont have any gyms add here <a href="/creategym">create gym</a>
            @endif
       
      
      
        
    </tbody>
    <tfoot>
        <tr>
                <th>Gymname</th>
                <th>Location</th>
                <th>Details</th>
                <th>Update</th>
                <th>delete</th>
        </tr>
    </tfoot>
</table>
<script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
@endsection 
