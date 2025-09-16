<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioCard extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'background_class',
        'image',
        'youtube_url',
        'position',
        'is_active'
    ];
    
    protected $casts = [
        'is_active' => 'boolean'
    ];
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeOrdered($query)
    {
        return $query->orderBy('position');
    }

    // Extract YouTube Video ID from the stored URL (supports youtube.com, youtu.be, embed, shorts)
    public function getYoutubeIdAttribute()
    {
        $url = $this->youtube_url;
        if (!$url) return null;
        $parts = parse_url($url);
        $host = $parts['host'] ?? '';
        $path = $parts['path'] ?? '';
        $query = $parts['query'] ?? '';

        // youtu.be/<id>
        if (strpos($host, 'youtu.be') !== false) {
            return ltrim($path, '/');
        }
        
        // youtube.com variants
        if (strpos($host, 'youtube.com') !== false || strpos($host, 'm.youtube.com') !== false || strpos($host, 'www.youtube.com') !== false) {
            // watch?v=<id>
            if ($query) {
                parse_str($query, $params);
                if (!empty($params['v'])) {
                    return $params['v'];
                }
            }
            // /embed/<id>
            if (preg_match('#/embed/([A-Za-z0-9_-]{6,})#', $path, $m)) {
                return $m[1];
            }
            // /shorts/<id>
            if (preg_match('#/shorts/([A-Za-z0-9_-]{6,})#', $path, $m)) {
                return $m[1];
            }
        }
        
        // Fallback: try to find v param anywhere
        if (preg_match('/[?&]v=([A-Za-z0-9_-]{6,})/', $url, $m)) {
            return $m[1];
        }
        
        return null;
    }
}
