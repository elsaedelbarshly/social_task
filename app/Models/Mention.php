<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    use HasFactory;
    protected $table = "mentions";
    protected $fillable = ['Mentioner_id','Mentioned_id','comment_id','post_id'];
    public function Mentioner()
    {
        return $this->hasMany(User::class, 'id', 'Mentioner_id');
    }
    public function Mentioned()
    {
        return $this->belongsTo(User::class, 'Mentioned_id', 'id');
    }
    public function Comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }
    public function Post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
