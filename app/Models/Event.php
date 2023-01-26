<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'message_content',
        'image',      
    ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
