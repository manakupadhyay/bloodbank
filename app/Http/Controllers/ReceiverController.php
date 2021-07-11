<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bloodsamplerequest;
use App\Models\User;
use App\Models\Receiver;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;

class ReceiverController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole('receiver');

        $receiver = new Receiver;
        $receiver->user_id = $user->id;
        $receiver->blood_group = $request->bloodgroup;
        $receiver->save();

        //assign permission via roles to user
        $permissions = User::where('id', '=', $user->id)->first()->getPermissionsViaRoles();
        $user->givePermissionTo($permissions);

        return redirect()->back()
            ->with(['message' => 'Successfully registered!']);
    }
    public function requestSample(Request $request)
    {
        $user_table = User::where('id', '=', $request->query('user_id'))->first();
        $receiver = Receiver::where('user_id', '=', $user_table->id)->first();
        $bsr = new Bloodsamplerequest;
        $bsr->hospital_id = $request->query('hospital_id');
        $bsr->receiver_name = $user_table->name;
        $bsr->receiver_email = $user_table->email;
        $bsr->receiver_blood_group = $receiver->blood_group;
        $bsr->save();
        
        return redirect()->back()
            ->with(['message' => 'Successfully requested sample!']);
    }
    
}
