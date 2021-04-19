@extends('templates.maintemplate')
@section('content')
  <div class="container">
    <div class="mb-3 mt-3">
      <form method="POST" action="{{route('country.store')}}">
        @csrf
        <label>Country Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="name" required>
        </div>
        <label>Country Code</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="code" required>
        </div>
        <label>Country Dialing Code</label>
        <div class="col-lg-10">
          <input type="number" class="form-control" name="dialing_code" required>
        </div>
        <div class="mt-3">
          <button class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
@endsection
