<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodsamplerequest extends Model
{
    protected $table = 'bloodsamplerequest';
    protected $fillable = [
        'id',
        'hospital_id',
    'receiver_name',
    'receiver_email',
    'receiver_blood_group',

    ];
}
