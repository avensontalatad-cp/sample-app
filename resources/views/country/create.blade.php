@extends('templates.maintemplate')
@section('content')
<div class="container">
    <div class="mb-3 mt-3">
        <label>Country Name</label>
        <form method="POST" action="{{route('country.store')}}">
            @csrf
            <div class="row">
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="country_name" required>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection