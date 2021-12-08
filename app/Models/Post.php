<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'creator_id',
        'number_of_comments',
        'number_of_likes',
        'image_id',
        'body',
        'group_id',
        'friend_id',
        'shared_id',

 ];

            public function Creator()
            {
                return $this->belongsTo(User::class ,  'creator_id' , 'id');
            }

            public function Comments()
            {
                return $this->hasMany(Comment::class , 'post_id' ,'id');
            }

            public function GroupPost()
            {
                return $this->belongsTo(Group::class ,'group_id' ,'id');
            }

            public function FriendPost()
            {
                return $this->belongsTo(User::class , 'friend_id', 'id');
            }

            public function SharedPost()
            {
                return $this->belongsTo(User::class ,'shared_id', 'id');
            }

            public function React()
                {
                    return $this->hasMany(React::class,'post_id','id');
                }

}




