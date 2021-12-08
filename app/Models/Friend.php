<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $table = 'friend';
    protected $fillable = [
        'user_id',
        'friend_id',
        'is_close',
    ];

    public function User()
    {
        return $this->belongdTo(User::class,'user_id','id');
    }
}
