<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;
    protected $fillable =[
        'start_year',
        'end_year',
        'company_id',
        // 'alumni_id',
        'position_id'
    ];
    protected $hidden =[
        'created_at',
        'updated_at'
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
