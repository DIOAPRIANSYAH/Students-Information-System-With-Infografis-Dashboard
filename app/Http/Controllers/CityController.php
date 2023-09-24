<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('components.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('components.cities.create');
    }

    public function store(Request $request)
    {
        City::create($request->all());
        return redirect()->route('components.cities.index')->with('success', 'City added successfully');
    }

    public function show($id)
    {
        $city = City::find($id);
        return view('components.cities.show', compact('city'));
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('components.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        return redirect()->route('components.cities.index')->with('success', 'City updated successfully');
    }

    public function destroy($id)
    {
        City::find($id)->delete();
        return redirect()->route('components.cities.index')->with('success', 'City deleted successfully');
    }
}
