<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use DB;
use Car;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;


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
        
        $timein = DB::table('cars')
        ->select('cars.created_at')
        ->where('car_plate', '=', $validatedData)
        ->get();

        $timeout = DB::table('checkouts')
        ->select('checkouts.created_at')
        ->where('car_plate', '=', $validatedData)
        ->get();

        // $time_in = Carbon::parse($timein)->format('H:i:s');
        // $time_out = Carbon::parse($timeout)->format('H:i:s');

        // $time_in = Carbon::parse( $timein);
        // $time_out = Carbon::parse( $timeout);

        // $diff =$time_out->diffInSeconds( $time_in);


         $difference = (strtotime($timeout) - strtotime($timein));
       $difference_in_hrs =$difference /60;
        // $diff_in_hrs = ($difference/3600);

        if( $difference_in_hrs<1){
                $message = "Parking is free";
        }
        else{
                $charges = ( $difference_in_hrs - 1)* 50;
                $message = "Pay: " + $charges;
        }
        
        return redirect('/car')->with('success', $message);
}

//         $timein = (String) $timein;
//         $timeout = (String) $timeout;


// // $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $timein);
// $to = Carbon::createFromFormat('H:i:s', $timein);
// $from = Carbon::createFromFormat('H:i:s', $timeout);
// // $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $timeout);

// $diff_in_min = $from - $to;
// // $diff_in_minutes = $to->diffInMinutes($from);
// // $diff_in_min = (string) $diff_in_min;

// // print_r($diff_in_minutes); // Output: 20

//        // $difference = (strtotime($timeout) - strtotime($timein));
//        // $difference_in_hrs =$difference /60;
//         // $diff_in_hrs = ($difference/3600);

       

public function index()
{
        $checkouts = Checkout::all();

        return view('index', compact('checkouts'));

        $time_out = $checkouts->created_at;
        echo($time_out);

       // return view('index', compact('checkouts'));
}
}
