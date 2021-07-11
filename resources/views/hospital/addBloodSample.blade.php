@extends('layouts.app')

@section('title')
Add Blood Sample
@endsection()

@section('content')

<div class="container my-3">
    
    @if(Session::has('message'))
    <h3 class="text-center my-3" style="color:green;">{{Session::get('message')}}</h3>
    @endif
    <div class="col-md-6 offset-md-3">
        <span class="anchor" id="formRegister"></span>
        <!-- form card register -->
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Add blood sample</h3>
            </div>
            <div class="card-body">
                <form class="form" role="form" autocomplete="off" action="/add-blood-sample" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="bloodgroup">Blood Group</label>
                        <input type="text" name="blood_group" class="form-control" id="bloodgroup" placeholder="Blood Group" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity(in litres)</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Quantity(in litres)" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg float-right">Register</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card register -->

    </div>
</div>

@endsection()