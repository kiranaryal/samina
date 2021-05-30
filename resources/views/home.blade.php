@extends('layouts.app')

@section('content')



@forelse($property as $property)
{{$property->name}}
<br>
{{$property->price}}
<br>
{{$property->description}}
<br>

<img src="/storage/{{$property->image}}" class="w-100" style="max-width:400px" >
@if(auth()->user()->role == 1)
<a href="/delete/{{$property->id}}">delete</a>
<a href="/edit/{{$property->id}}">edit</a>
@else
<a href="/book/{{$property->id}}">book</a>
@endif
@empty
@endforelse
@endsection
