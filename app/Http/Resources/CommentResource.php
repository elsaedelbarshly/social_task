<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
        "user_id"=>$this->user_id,
        "post_id"=>$this->post_id,
        "body"=>$this->body,
        "image_id"=>$this->image_id,
        "parent_id"=>$this->parent_id,
        // "user_name"=>$this->when($this->User()->exists(),$this->User->name),
        // "user_email"=>$this->when($this->User()->exists(),$this->User->email),
       ];
    }
}
