<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bacth_id',
        'major_id'
    ];
    public function batch()
    {
        return $this->belongsTo(Batch::class,'batch_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function major()
    {
        return $this->belongsTo(Major::class,'major_id');
    }
    public function workExperience(){
        return $this->hasMany(WorkExperience::class,'workExperience_id');
    }
    public function skill(){
        return $this->hasMany(Skill::class);
    }
}
