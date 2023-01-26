<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMembership extends Model
{
    use HasFactory;

    protected $table = 'group_post';
    
    protected $fillable = [
        'post_id',
        'group_id',
    ];
}
