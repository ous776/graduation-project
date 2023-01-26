<?php

namespace App\Models;
use App\Models\Media;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'sender_name',
        'receiver_name',
        'message_content',
        'attachment',
        'is_read',

    ];
    public function media()
    {
        return $this->hasMany(Media::class);
    }
}
