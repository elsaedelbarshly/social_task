<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class React extends Model
{
    use HasFactory;
    protected $table ='reacts';
    protected $fillable = [
        'type_id',
        'comment_id',
        'post_id',
        'user_id'
    ];

    public function ReactType()
    {
        return $this->belongsTo(ReactType::class,'type_id','id');
    }

    public function Comment()
    {
        return $this->belongsTo(Comment::class,'comment_id','id');
    }

    public function Post()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
