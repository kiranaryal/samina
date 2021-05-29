@extends('layouts.app')

@section('content')



@forelse($land as $land)
{{$land->description}}

<img src="/storage/{{$land->image}}" class="w-100" style="max-width:400px" >
@if(auth()->user()->role == 1)
<a href="/delete/{{$land->id}}">delete</a>
@endif
@empty
@endforelse
@endsection
