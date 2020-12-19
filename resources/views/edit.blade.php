@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Car Data
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cars.update', $cars_display->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <!-- <label for="country_name">Car Brand:</label> -->
              <input type="text" placeholder="Car Brand" class="form-control" name="car_brand" value="{{ $cars_display->car_brand }}"/>
          </div>
          <div class="form-group">
              <!-- <label for="symptoms">Plate :</label> -->
              <input type="text" placeholder="Car Plate" class="form-control" name="car_plate" value="{{ $cars_display->car_plate }}"/>
          </div>
          <div class="form-group">
              <!-- <label for="cases">Make :</label> -->
              <input type="text" placeholder="Car Make" class="form-control" name="car_make" value="{{ $cars_display->car_make }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection