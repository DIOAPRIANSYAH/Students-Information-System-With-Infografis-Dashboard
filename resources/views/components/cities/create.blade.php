@extends('layouts.app')

@section('content')
    <h2>Add City</h2>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="city_name">City Name</label>
            <input type="text" class="form-control" id="city_name" name="city_name" required>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
@endsection
