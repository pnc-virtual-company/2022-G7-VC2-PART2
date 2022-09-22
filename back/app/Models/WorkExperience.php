<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workExperience extends Model
{
    use HasFactory;
    protected $fillable =[
        'start_year',
        'end_year',
        'company_id',
        'alumni_id',
        'position',
        'current'
    ];
    protected $hidden =[
        'created_at',
        'updated_at'
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function alumni(){
        return $this->belongsTo(Alumni::class);
    }
}
