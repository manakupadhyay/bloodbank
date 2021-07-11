@extends('layouts.app')

@section('title')
Blood sample requests
@endsection

@section('content')
<div class="container">
    <h1 class="text-center pb-2">Blood Sample Requests</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Receiver Name</th>
                    <th scope="col">Receiver Email</th>
                    <th scope="col">Blood Group</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                <tr>
                    <td>{{ $request->receiver_name }}</td>
                    <td>{{ $request->receiver_email }}</td>
                    <td>{{ $request->receiver_blood_group }}</td>
                    
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</div>
@endsection