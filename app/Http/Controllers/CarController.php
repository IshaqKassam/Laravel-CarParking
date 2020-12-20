<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    // //
    public function index()
    {
        
        $cars_display = Car::all();

        return view('index', compact('cars_display'));
    }

    public function create()
{
   return view('car');
}

public function store(Request $request)
{
        $validatedData = $request->validate([
            'car_brand' => 'required|max:255',
            'car_plate' => 'required',
            'car_make' => 'required',
        ]);
        $show = Car::create($validatedData);
   
        return redirect('/car')->with('success', 'Car successfully saved');
}

public function edit($id)
{
        $cars_display = Car::findOrFail($id);

        return view('edit', compact('cars_display'));
}

public function update(Request $request, $id)
{
        $validatedData = $request->validate([
            'car_brand' => 'required|max:255',
            'car_plate' => 'required',
            'car_make' => 'required',
        ]);
        Car::whereId($id)->update($validatedData);

        return redirect('/cars')->with('success', 'Car Data is successfully updated');
}

public function destroy($id)
{
        $cars_display = Car::findOrFail($id);
        $cars_display->delete();

        return redirect('/cars')->with('success', 'Cars Data is successfully deleted');
}



}
