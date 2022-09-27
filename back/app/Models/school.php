<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class school extends Model
{
    use HasFactory;
    public function alumni(){
        return $this->belongsTo(Alumni::class);
    }
    protected $casts = [
        'current' => 'boolean',
     ];
     protected function serializeDate(DateTimeInterface $date)
     {
         return $date->format('d, l F Y H:i:s A');
     }
}
