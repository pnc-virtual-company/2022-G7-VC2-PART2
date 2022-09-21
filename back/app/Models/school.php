<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    use HasFactory;
    public function alumni(){
        return $this->belongsTo(Alumni::class);
    }
    protected $casts = [
        'current' => 'boolean',
     ];
}
