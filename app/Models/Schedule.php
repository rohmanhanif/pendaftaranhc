<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }
    public function presences(){
        return $this->hasMany(Presence::class,'schedule_id');
    }
}
