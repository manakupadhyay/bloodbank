@extends('layouts.app')

@section('title')
Hospital Registration
@endsection

@section('content')

<div class="jumbotron">
    <h1 class="text-center">Hospital Registration</h1>
    <p class="lead text-center">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
</div>
@if(Session::has('message'))
<h3 class="text-center" style="color:green;">{{Session::get('message')}}</h3>
<p class="text-center">You can now login!</p>
@endif
<div class="col-md-6 offset-md-3">
    <span class="anchor" id="formRegister"></span>
    <!-- form card regiregisteredster -->
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Register as Hospital</h3>
        </div>
        <div class="card-body">
            <form autocomplete="off" action="/register-hospital" method="POST">
                @csrf
                <div class="form-group">
                    <label for="hospitalname">Hospital Name</label>
                    <input type="text" name="name" class="form-control" id="hospitalname" placeholder="Hospital name" required>
                </div>
                <div class="form-group">
                    <label for="hospitalemail">Hospital Email</label>
                    <input type="email" name="email" class="form-control" id="hospitalemail" placeholder="Hospital Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="hospitaladdress">Hospital Address</label>
                    <input type="text" name="address" class="form-control" id="hospitaladdress" placeholder="Hospital Address" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-right">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /form card register -->
</div>

@endsection