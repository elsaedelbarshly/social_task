<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'image_id',
        'parent_id',

    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id' ,'id');
    }

    public function Post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function Comment()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }

    public function Reply()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function React()
    {
        return $this->hasMany(React::class,'comment_id','id');
    }


}
