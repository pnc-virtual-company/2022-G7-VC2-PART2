<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'alumni_id'
    ];
    public function alumni(){
        return $this->belongsTo(Alumni::class,'alumni_id');
    }
}
