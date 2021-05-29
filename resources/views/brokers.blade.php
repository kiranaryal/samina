@extends('layouts.app')

@section('content')


list of brokers here


@forelse($brokers as $broker)
@empty
no brokers available
@endforelse

@endsection