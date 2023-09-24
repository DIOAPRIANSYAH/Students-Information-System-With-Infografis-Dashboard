@extends('layouts.app')

@section('content')
    <h2>Edit City</h2>
    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="city_name">City Name</label>
            <input type="text" class="form-control" id="city_name" name="city_name" value="{{ $city->city_name }}" required>
        </div>
        <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" value="{{ $city->state }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
