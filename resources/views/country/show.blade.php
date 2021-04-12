@extends('templates.maintemplate')
@section('content')
<div class="container">
    <div class="mb-3 mt-3">
        <h3>Country Name: {{$country->name}}</h3>
        <h3>Country Code: {{$country->code}}</h3>
        <h3>Country Dialing Code: {{$country->dialing_code}}</h3>
    </div>
</div>
@endsection