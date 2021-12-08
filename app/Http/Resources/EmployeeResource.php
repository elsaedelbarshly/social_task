<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            //key of return => key of object
            'el3enwan' => 'address',
            'Education' => $this->education,
            'phone_no' => $this->phone_no,
            'date_of_birth'=>$this->date_of_birth,
            'email' => $this->when($this->User()->exists(),$this->User->email),
            // 'organization_description' => $this->when($this->Organization()->exists(),$this->Organization->description),
        ];
    }
}
