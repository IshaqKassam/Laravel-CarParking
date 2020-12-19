<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    // //
    public function index()
    {
        return view('car');
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
   
        return redirect('/cars')->with('success', 'Car successfully saved');
}





}
