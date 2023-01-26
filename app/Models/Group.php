<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'photo',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, GroupMembership::class, 'group_id', 'user_id');
    }

    public function posts(){
        return $this->belongsToMany(Post::class, PostMembership::class, 'group_id', 'post_id');
    }

    public function getAllMembersAttribute()
    {
        return $this->members->push($this->owner);
    }
}
