<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FriendResource extends JsonResource
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
            'Name' => $this->when($this->User()->exists(),$this->User->name),
            'Email' => $this->when($this->User()->exists(),$this->User->email),
            'Status' => $this->when($this->User()->exists(),$this->User->is_active),
            'Bio' => $this->when($this->User()->exists(),$this->User->bio),
            'Education' => $this->when($this->User()->exists(),$this->User->education),
            'Info' => $this->when($this->User()->exists(),$this->User->info),
            'Gender' => $this->when($this->User()->exists(),$this->User->gender),
            // 'friend_id',
            // 'is_close',
        ];
    }
}
