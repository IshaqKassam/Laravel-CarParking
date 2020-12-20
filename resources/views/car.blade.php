@extends('layouts.app')


@section('content')
<div class="card-body">
    <!-- @if ($errors->any())
      <div class="alert">
            @foreach ($errors->all() as $error)
              <script>alert($error)</script>
            @endforeach
      </div>
    @endif -->

    @if(session()->get('success'))
    <div class="alert">
      @php
      $alert = ( session()->get('success') );
      echo "<script>alert('$alert')</script>"
      @endphp
    
    
    </div><br />
  @endif
   
    <!-- car registration form -->
    <!-- form posts the car details to CarController in the store method-->
    <div>
    <p><a class="back" href="{{route('home')}}">Back</a></p>
    </div>
      <form class="car-reg" method="post" action="{{ route('cars.store') }}">
      <div class="login-box">
      <h1>Car Details</h1> 
      <div class="textbox">
              @csrf
              <input type="text" required id="car-brand" name="car_brand" placeholder="Car Brand">
          </div>

          <div class="textbox">
          <input type="text " required id="numberplate" name="car_plate" placeholder="Number Plate">
          </div>

          <div class="textbox">
          <input type="text" required id="car-make" name="car_make" placeholder="Car Make">
          </div>
          <br>
          <div class="center">
          <button type="submit" name="car_reg_details" class="register-button">Register Car</button>
          </div>
          <br>
          </div>
      </form>
  </div>
@endsection