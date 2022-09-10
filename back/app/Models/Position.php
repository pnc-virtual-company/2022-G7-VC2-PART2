<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkExperience;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function workExperience(){
        return $this->hasMany(WorkExperience::class);
    }
}
