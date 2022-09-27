<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

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
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d, l F Y H:i:s A');
    }
}
