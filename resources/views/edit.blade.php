@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  .error{
    color: red;
  }
</style>
<div class="card uper">
<div>
<p><a class="back" href="{{route('home')}}">back</a></p>
</div>
  <div class="card-header">
    Edit Car Data
  </div>
  <div class="error">
    @if ($errors->any())
      <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    @if(session()->get('success'))
    <div class="alert">
      @php
      $alert = ( session()->get('success') );
      echo "<script>alert('$alert')</script>"
      @endphp
    
    
    </div><br />
  @endif
      <form method="post" action="{{ route('cars.update', $cars_display->id ) }}">
        <div class="login-box">
        <h1>Edit Details</h1> 
          <div class="textbox">
              @csrf
              @method('PATCH')
              <input type="text" placeholder="Car Brand" class="form-control" name="car_brand" value="{{ $cars_display->car_brand }}"/>
          </div>
          <div class="textbox">
              <input type="text" placeholder="Car Plate" class="form-control" name="car_plate" value="{{ $cars_display->car_plate }}"/>
          </div>
          <div class="textbox">
              <input type="text" placeholder="Car Make" class="form-control" name="car_make" value="{{ $cars_display->car_make }}"/>
          </div>
          <button type="submit" class="register-button">Update Data</button>
        </div>
      </form>
  </div>
</div>
@endsection