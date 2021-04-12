@extends('templates.maintemplate')
@section('content')
<div class="container">
    @if(session()->has('error'))
        <div class="alert alert-danger text-center">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="mb-3 mt-3">
        <form method="POST" action="{{route('country.update', $country->id)}}">
            @method('PATCH')
            @csrf
            <label>Country Name</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="{{ $country->name }}" name="name" required>
            </div>
            <label>Country Code</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" value="{{ $country->code }}" name="code" required>
            </div>
            <label>Country Dialing Code</label>
            <div class="col-lg-10">
                <input type="number" class="form-control" value="{{ $country->dialing_code }}" name="dialing_code" required>
            </div>
            <div class="mt-3">
                <input type="submit" value="update" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection