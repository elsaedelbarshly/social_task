<?php

namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles,SoftDeletes;

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'is_active',
        'is_admin',
        'type_id',
        'profile_image_id',
        'cover_image_id',
        'google_id',
            'is_admin',
            'bio',
            'education',
            'info'
    ];
  
    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' , 'datetime',
    ];

    public function Friend()
    {
        return $this->hasMany(Friend::class,'user_id','id');
    }

    public function Group()
    {
        return $this->belongsToMany(Group::class,Groubmember::class ,'user_id', 'group_id');
    }

    public function React()
    {
        return $this->hasMany(React::class,'user_id','id');
    }
}
