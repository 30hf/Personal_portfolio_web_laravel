<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable = [
        'experience_id',
        'education_id',
      'skill_id',
        'language_id',
    ];
    public function experience(){
        return $this->belongsTo(Experience::class,'experience_id');
    }
    public function education(){
        return $this->belongsTo(Education::class,'education_id');
    }
    public function skill(){
        return $this->belongsTo(Skill::class,'skill_id');
    }
    public function language(){
        return $this->belongsTo(Languages::class,'language_id');
    }
}
