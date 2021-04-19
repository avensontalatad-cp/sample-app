@extends('templates.maintemplate')
@section('content')
  <div class="container">
    <div class="mb-3 mt-3">
      <form method="POST" action="{{route('country.update', $country->id)}}">
        @method('PATCH')
        @csrf
        <label>Country Name</label>
        <div class="col-lg-12">
          <input type="text" class="form-control" value="{{ $country->name }}" name="name" required>
        </div>
        <label>Country Code</label>
        <div class="col-lg-12">
          <input type="text" class="form-control" value="{{ $country->code }}" name="code" required>
        </div>
        <label>Country Dialing Code</label>
        <div class="col-lg-12">
          <input type="number" class="form-control" value="{{ $country->dialing_code }}" name="dialing_code" required>
        </div>
        <div class="mt-3">
          <input type="submit" value="update" style="float:right" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
@endsection
