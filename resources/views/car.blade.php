<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <form class="form">
    <h2>Register a Car Here</h2>
</form>
</body>
</html> -->
@extends('layouts.app')


@section('content')

<form class="car-reg" action="web_actions.php" method="POST">
      <div class="login-box">
        <h1>Car Details</h1>

        <div class="textbox">
          <input type="text " id="numberplate" name="numberPlate" placeholder="Number Plate">
          <br>
        </div>
        <div class="textbox">
          <input type="text" id="car-brand" name="car-brand" placeholder="Car Brand">
          <br>
        </div>

        <div class="textbox">
          <input type="text" id="car-make" name="car-make" placeholder="Car Make">
          <br>
        </div>

       <br>
        <div class="center">
          <button type="submit" name="car_reg_details" class="register-button">Register Car</button>
        </div>
        <br>
        <div class="center">
          <button type="submit" name="back" class="register-button">   Back</button>
        </div>
       <br>
      </div>
    </form>

@endsection