@extends('layouts.app')

@section('content')
<form action="/updategyms/{{$gyms->id}}" method="post">
@csrf
<input type="text" name="gymname" value="{{$gyms->gymname}}"  />
<input type="text" name="location" value="{{$gyms->location}}"/>
<input type="text" name="details" value="{{$gyms->details}}" /> 
<input type="submit"/>
</form>
@endsection