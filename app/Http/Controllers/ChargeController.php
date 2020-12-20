<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ChargeController extends Controller
{
    function index(){
        $data = DB::table('cars')
        ->join('checkouts', 'checkouts.car_plate', '=', 'cars.car_plate')
        ->select('cars.created_at', 'checkouts.created_at')
        ->get();

        return view('join_table', compact('data'));
    }
}
