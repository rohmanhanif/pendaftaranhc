<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    public function schedule(){
        return $this->belongsTo(Schedule::class,'schedule_id');
    }
    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}