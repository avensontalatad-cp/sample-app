@extends('templates.maintemplate')
@section('content')
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="mb-3 mt-3">
        <h5>Country Name: {{$country->name}}</h5>
        <h5>Country Code: {{$country->code}}</h5>
        <h5>Country Dialing Code: {{$country->dialing_code}}</h5>
        <h5 class="mt-3">List of States</h5>
        <button data-bs-toggle="modal" data-bs-target="#addStateModal" style="float:right" class="mb-3 btn btn-primary">Add State</button>
        <table class="table table-bordered text-center">
            <thead>
                <th>State</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($country->states as $state)
                    <tr>
                        <td>{{ $state->name }}</td>
                        <td>
                            <a href="{{ route('state.show', $state->id) }}" class="btn btn-dark">View</a>
                            <a href="{{ route('state.edit', $state->id) }}" class="btn btn-primary">Edit</a>
                            <button data-bs-toggle="modal" data-bs-target="#deleteStateModal{{ $state->id }}" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>

                    <!-- Delete State Modal -->
                    <div class="modal fade" id="deleteStateModal{{ $state->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete State</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <form method="POST" action="{{ route('state.destroy', $state->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete {{ $state->name }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" value="Confirm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete State Modal -->
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Add State Modal -->
<div class="modal fade" id="addStateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add State</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('state.store') }}">
        @method('POST')
        @csrf
        <div class="modal-body">
            <label>State Name</label>
            <input type="text" class="form-control" name="name">
            <input type="hidden" name="country_id" value="{{ $country->id }}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Confirm">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End State Modal -->

@endsection