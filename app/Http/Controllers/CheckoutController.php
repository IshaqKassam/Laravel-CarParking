<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;

class CheckoutController extends Controller
{
    
public function create()
{
   return view('car_checkout');
}

public function store(Request $request)
{
        $validatedData = $request->validate([
            'car_plate' => 'required',
           
        ]);
        $show = Checkout::create($validatedData);
   
        return redirect('/cars')->with('success', 'Car Checkout successful');
}

public function index()
{
        $checkouts = Checkout::all();

        return view('index', compact('checkouts'));

        $time_out = $checkouts->created_at;
        echo($time_out);

       // return view('index', compact('checkouts'));
}
}
