<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloodsample extends Model
{
    protected $table = 'bloodsample';
    protected $fillable = [
        'id',
        'hospital_id',
    'hospital_name',
    'hospital_address',
    'blood_group',
    'quantity',
    ];
}
