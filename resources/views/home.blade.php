@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->

                <div class="card-body">
                    @if (session('status') == "iap@gmail.com")
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('car')
                    <a class="nav-link" href="{{ route('cars') }}">{{ __('Car') }}</a>
                    <!-- {{ __('You are the Admin!') }} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

