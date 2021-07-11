@extends('layouts.app')

@section('title')
Homepage
@endsection

@section('content')

<div class="jumbotron">
    <h1 class="display-4 text-center">Blood Bank</h1>
    <p class="lead text-center">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    @guest
    <hr class="my-4">
    <div class="container text-center">
        <a class="btn btn-dark btn-lg mx-5" href="/register-hospital" role="button">Register as Hospital</a>
        <a class="btn btn-info btn-lg" href="/register-receiver" role="button">Register as Recevier</a>
    </div>
    @endguest
    @hasrole('hospital')
    <div class="container text-center">
        <a class="btn btn-danger btn-lg mx-5" href="/add-blood-sample" role="button">Add blood sample</a>
        <a class="btn btn-success btn-lg mx-5" href="/blood-sample-request" role="button">View sample requests</a>
    </div>
    @endhasrole
</div>

@if(Session::has('message'))
<h3 class="text-center" style="color:green;">{{Session::get('message')}}</h3>
@endif

<div class="container">
    <h1 class="text-center pb-2">Available Blood Samples</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    
                    <th scope="col">Hospital Name</th>
                    <th scope="col">Blood Group</th>
                    <th scope="col">Quantity(in litres)</th>
                    <th scope="col">Address</th>
                    @hasrole('receiver')
                    <th scope="col">Action</th>
                    @endhasrole
                </tr>
            </thead>
            <tbody>
            @foreach($bloodsamples as $bloodsample)
                <tr>
                   
                    
                    <td>{{$bloodsample->hospital_name}}</td>
                    <td>{{$bloodsample->blood_group}}</td>
                    <td>{{$bloodsample->quantity}}</td>
                    <td>{{$bloodsample->hospital_address}}</td>
                    @hasrole('receiver')
                    <td>
                        <a href="/request-sample?hospital_id={{$bloodsample->hospital_id}}&user_id={{$user->id}}" class="btn btn-sm btn-warning">Request Sample</a>
                    </td>
                    @endhasrole('receiver')

                    
                </tr>          
                @endforeach

            </tbody>
        </table>
    </div>

</div>

@endsection