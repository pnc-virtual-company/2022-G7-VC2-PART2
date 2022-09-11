<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkExperience;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'image'
    ];
    protected $hidden =[
        'created_at',
        'updated_at'
    ];
    public function workExperience(){
        return $this->hasMany(WorkExperience::class);
    }
}
