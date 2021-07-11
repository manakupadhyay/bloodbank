<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $table = 'receiver';
    protected $fillable = [
        'id',
    'user_id',
    'blood_group',
   ];
}
