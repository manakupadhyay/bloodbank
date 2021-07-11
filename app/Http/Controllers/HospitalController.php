<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Bloodsample;
use App\Models\Bloodsamplerequest;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class HospitalController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole('hospital');


        $hospital = new Hospital;
        $hospital->user_id = $user->id;
        $hospital->address = $request->address;
        $hospital->save();

        //assign permission via roles to user
        $permissions = User::where('id', '=', $user->id)->first()->getPermissionsViaRoles();
        $user->givePermissionTo($permissions);

        return redirect()->back()
            ->with(['message' => 'Successfully registered!']);
    }
    public function addBloodSample(Request $request)
    {
        $curr_user = auth()->user();
        $user_table = User::where('email','=', $curr_user->email)->first();
        $hospital_table = Hospital::where('user_id','=', $user_table->id)->first();

        $bloodsample = new Bloodsample;
        $bloodsample->hospital_id = $hospital_table->id;
        $bloodsample->hospital_name = $user_table->name;
        $bloodsample->hospital_address = $hospital_table->address;
        $bloodsample->blood_group = $request->blood_group;
        $bloodsample->quantity = $request->quantity;
        $bloodsample->save();

        return redirect()->back()
            ->with(['message' => 'Successfully added blood sample!']);
    }
    public function viewRequest()
    {
        $curr_user = auth()->user();
        $user_table = User::where('email','=', $curr_user->email)->first();
        $hospital_table = Hospital::where('user_id','=', $user_table->id)->first();
    
        $requests = Bloodsamplerequest::where('hospital_id','=', $hospital_table->id)->get();
        return view('hospital.viewRequest', compact('requests'));

    }
}
