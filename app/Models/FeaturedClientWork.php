<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedClientWork extends Model
{
    use HasFactory;
    
    protected $table = 'featured_client_work';
    
    protected $fillable = [
        'title',
        'subtitle',
        'position'
    ];
}
