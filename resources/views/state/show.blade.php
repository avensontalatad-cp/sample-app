@extends('templates.maintemplate')
@section('content')
  <div class="container">
    <h5>State Name: {{ $state->name }}</h5>
    <h5>Country Name : {{ $state->country->name }}</h5>
  </div>
@endsection
