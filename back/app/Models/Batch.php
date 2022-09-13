<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'generation'
    ];
    public function alumni(){
        return $this->hasMany(Alumni::class);
    }
    protected $hidden =[
        'created_at',
        'updated_at'
    ];
}