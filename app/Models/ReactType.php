<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactType extends Model
{
    use HasFactory;
    
    protected $table ='react_types';
    protected $fillable = [
        'type',
    ];

    public function React()
    {
        return $this->hasMany(React::class,'type_id','id');
    }
}
