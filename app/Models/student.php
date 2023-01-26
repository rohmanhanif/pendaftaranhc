<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'name',
        'photo',
        'email',
        'phone',
    ];

    public function groups(){
        return $this->belongsToMany(Group::class,'members','student_id','group_id');
    }
    public function presences(){
        return $this->hasMany(Presence::class,'student_id');
    }
}
