@extends('templates.maintemplate')
@section('content')
  <div class="container">
    @if(session()->has('message'))
      <div class="alert alert-success text-center">
        {{ session()->get('message') }}
      </div>
    @endif

    @if(session()->has('error'))
      <div class="alert alert-danger text-center">
        {{ session()->get('error') }}
      </div>
    @endif

    <a href="{{route('country.create')}}" class="btn btn-primary mt-3 mb-3" style="float: right">Create Country</a>
    <table class="table table-striped text-center">
      <thead>
      <tr>
        <th>Name</th>
        <th style="width: 400px">Action</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($country as $country)
        <tr>
          <td>{{ $country->name }}</td>
          <td>
            <a href="{{ route('country.show', $country->id) }}" class="btn btn-dark ">View</a>
            <a href="{{ route('country.edit', $country->id) }}" class="btn btn-primary ">Edit</a>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#countryModal{{$country->id}}">Delete</a>
          </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="countryModal{{$country->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete {{ $country->name }}?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form method="POST" action="{{route('country.destroy', $country->id)}}">
                  @method('DELETE')
                  @csrf
                  <input type="submit" class="btn btn-primary" value="Yes">
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal end  -->

      @endforeach
      </tbody>
    </table>
  </div>

@endsection
