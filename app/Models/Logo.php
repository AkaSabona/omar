<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'read_more',
        'image',
        'position',
        'is_active',
        'popup_title',
        'popup_description',
        'popup_video_url',
        'popup_content',
        'popup_additional_sections'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'popup_content' => 'array',
        'popup_additional_sections' => 'array'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }
}