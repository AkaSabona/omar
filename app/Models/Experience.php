<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company_name',
        'position',
        'duration',
        'year',
        'description',
        'logo_class',
        'logo_icon',
        'logo_text',
        'logo_image',
        'is_clickable',
        'target_logos',
        'order_position',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean',
        'is_clickable' => 'boolean',
        'target_logos' => 'array'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('order_position');
    }
}