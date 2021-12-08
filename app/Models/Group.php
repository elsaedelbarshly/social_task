<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    protected $fillable = ['name','creator_id','description','image_id'];

    public function Creator()
    {
        return $this->belongsTo(User::class, 'id', 'creator_id');
    }
    public function User()
    {
        return $this->belongsToMany(User::class,Groubmember::class ,'user_id', 'group_id');
    }

    use HasFactory;
}
