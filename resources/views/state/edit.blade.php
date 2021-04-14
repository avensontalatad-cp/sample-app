@extends('templates.maintemplate')
@section('content')
  <div class="container">
    <form method="POST" action="{{ route('state.update', $state->id) }}">
      @method('PUT')
      @csrf
      <input type="text" class="form-control" value="{{ $state->name }}" name="name">
      <input type="hidden" name="country_id" value="{{ $state->country->id }}">

      <input type="submit" style="float:right" class="btn btn-primary mt-3" value="Update">
    </form>
  </div>
@endsection
