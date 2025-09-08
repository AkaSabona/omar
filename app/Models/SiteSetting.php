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
        'astronaut_section_description',
        // Email & SMTP settings
        'admin_email',
        'mail_enabled',
        'mail_host',
        'mail_port',
        'mail_encryption',
        'mail_username',
        'mail_password',
        'mail_from_address',
        'mail_from_name'
    ];
    
    protected $casts = [
        'profile_skills' => 'array',
        'mail_enabled' => 'boolean'
    ];
}
