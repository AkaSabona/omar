<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'project_type',
        'budget',
        'timeline',
        'industry',
        'subject',
        'message',
        'additional_services',
        'referral_source',
        'privacy_agreement',
        'is_read'
    ];

    protected $casts = [
        'additional_services' => 'array',
        'privacy_agreement' => 'boolean',
        'is_read' => 'boolean'
    ];

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }
}
