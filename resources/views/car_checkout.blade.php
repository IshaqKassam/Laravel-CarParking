@extends('layouts.app')


@section('content')
<div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
   
    <!-- car registration form -->
    <!-- form posts the car details to CarController in the store method-->
    <div>
    <p><a class="back" href="{{route('home')}}">Back</a></p>
    </div>
      <form class="car-reg" method="post" action="{{ route('checkouts.store') }}">
      <div class="login-box">
      <h1>Car Checkout</h1> 
      <div class="textbox">
              @csrf
              <input type="text" id="car-plate" name="car_plate" placeholder="Car Plate">
          </div>
          <br>
          <div class="center">
          <button type="submit" name="car_reg_details" class="register-button">Checkout Car</button>
          </div>
          <br>
          </div>
      </form>
  </div>
@endsection