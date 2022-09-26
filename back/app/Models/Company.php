<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\workExperience;
use DateTimeInterface;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
    ];
    protected $hidden =[
        'created_at',
        'updated_at'
    ];
    public function workExperience(){
        return $this->hasMany(workExperience::class);
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d, l F Y H:i:s A');
    }
}
