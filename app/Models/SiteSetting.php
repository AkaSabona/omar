<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'projects_count',
        'avg_increase',
        'years_experience',
        'profile_name',
        'profile_title',
        'profile_skills',
        'astronaut_section_title',
        'astronaut_section_description'
    ];
    
    protected $casts = [
        'profile_skills' => 'array'
    ];
}
