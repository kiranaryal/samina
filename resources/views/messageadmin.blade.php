@extends('layouts.app')

@section('content')

  <form action="/message/store" class="p-3"method="post">
  @csrf
<input type="text"class="form-control" name="message">
 <input type="hidden" name="profile_id" value="Null">
 

 </form>



@endsection
