<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            "body" => $this->body,
            "reacts_count" => $this->reacts_count,
            "comments_count" => $this->comments_count,
            "image_id" => $this->image_id,
            "creator_id" => $this->creator_id,
            "friend_id" => $this->friend_id,
            "group_id" => $this->group_id,
            "shared_id" => $this->shared_id,

        ];
    }
}
