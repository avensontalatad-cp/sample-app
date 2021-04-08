@extends('templates.maintemplate')
@section('content')
<div class="container">
    <div class="mb-3 mt-3">
        <label>Country Name</label>
        <form method="POST" action="{{route('country.update', $country->id)}}">
            @method('PATCH')
            @csrf
            <div class="row">
                <div class="col-lg-10">
                    <input type="text" class="form-control" value="{{ $country->name }}" name="country_name" required>
                </div>
                <div class="col-lg-2">
                    <input type="submit" value="update" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection