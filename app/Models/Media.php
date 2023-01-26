<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['chat_id', 'name', 'type'];

    public function message()
    {
        return $this->belongsTo('App\Models\Chat', 'chat_id', 'id');
    }
}
