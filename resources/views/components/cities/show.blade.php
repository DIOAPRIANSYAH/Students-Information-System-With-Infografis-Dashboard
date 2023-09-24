@extends('layouts.app')

@section('content')
    <h2>City Details</h2>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $city->id }}</td>
        </tr>
        <tr>
            <th>City Name</th>
            <td>{{ $city->city_name }}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{ $city->state }}</td>
        </tr>
    </table>
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Back</a>
@endsection
