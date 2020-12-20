<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use DB;
use Car;

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
        
        $data = DB::table('cars')
        ->join('checkouts', 'checkouts.car_plate', '=', 'cars.car_plate')
        ->select('cars.created_at', 'checkouts.created_at')
        ->get();

        $timein = DB::table('cars')->select('cars.created_at')->get();

        $timeout = DB::table('checkouts')->select('checkouts.created_at')->get();

        $difference = (strtotime($timeout) - strtotime($timein));
        $diff_in_hrs = floor($difference/3600);

        if($diff_in_hrs<1){
                $message = "Pay your money";
        }
        else{
                $message = "Pay your Dues";
        }
        
        return redirect('/car')->with('success',$message);
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
