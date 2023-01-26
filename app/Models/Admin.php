<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'full_name',
        'email',
        'date_of_birth',
        'phone_number',
        'gender',
        'photo',
        'role',
            
    ];

}
