<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Friendship;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'address',
        'birth_date',
        'gender',
        'marital_status',
        'phone_number',
        'status',
        'profile_photo_path',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected function defaultProfilePhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->full_name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? url('storage/' . $this->profile_photo_path)
            : $this->defaultProfilePhotoUrl();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function friends()
    {
        return $this->hasMany(Friendship::class, 'user_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function getOnlineAttribute()
    {
        return $this->sessions->count() !== 0;
    }

    /**
     * Get all the groups the user belonged to.
     */
    public function groups(){
        return $this->belongsToMany(Group::class, GroupMembership::class, 'user_id', 'group_id');
    }

    /**
     * Get only all the user owned groups.
     */
    public function ownedGroups(){
        return $this->hasMany(Group::class, 'user_id', 'id');
    }

    /**
     * Get all the user groups (included the owned ones). 
     */
    public function getAllGroupsAttribute(){
        return $this->ownedGroups->concat($this->groups);
    }
    
    public function isMember($gp){
        return $this->allGroups->contains(function ($group, $key) use ($gp) {
            return $gp->id == $group->id;
        });
    }
}
