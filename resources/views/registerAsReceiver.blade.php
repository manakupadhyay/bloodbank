@extends('layouts.app')

@section('title')
Receiver Registration
@endsection

@section('content')

<div class="jumbotron">
    <h1 class="text-center">Receiver Registration</h1>
    <p class="lead text-center">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
</div>

@if(Session::has('message'))
<h3 class="text-center" style="color:green;">{{Session::get('message')}}</h3>
<p class="text-center">You can now login!</p>
@endif

<div class="col-md-6 offset-md-3">
    <span class="anchor" id="formRegister"></span>

    <!-- form card register -->
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3 class="mb-0">Register as Receiver</h3>
        </div>
        <div class="card-body">
            <form class="form" role="form" autocomplete="off" action="/register-receiver" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Receivername">Receiver Name</label>
                    <input type="text" name="name" class="form-control" id="Receivername" placeholder="Receiver name" required>
                </div>
                <div class="form-group">
                    <label for="Receiveremail">Receiver Email</label>
                    <input type="email" name="email" class="form-control" id="Receiveremail" placeholder="Receiver Email" required>
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
                    <label for="bloodgroup">Blood Group</label>
                    <select name="bloodgroup" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="O">O</option>
                        <option value="AB">AB</option>
                    </select>

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