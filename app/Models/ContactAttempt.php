<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ContactAttempt extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'email',
        'user_agent',
        'last_attempt_at',
        'attempt_count',
        'blocked_until'
    ];

    protected $dates = [
        'last_attempt_at',
        'blocked_until'
    ];

    /**
     * Check if IP address is currently blocked
     */
    public static function isBlocked($ipAddress)
    {
        $attempt = self::where('ip_address', $ipAddress)
                      ->where('blocked_until', '>', Carbon::now())
                      ->first();
        
        return $attempt !== null;
    }

    /**
     * Get remaining block time in seconds
     */
    public static function getBlockTimeRemaining($ipAddress)
    {
        $attempt = self::where('ip_address', $ipAddress)
                      ->where('blocked_until', '>', Carbon::now())
                      ->first();
        
        if ($attempt) {
            return Carbon::now()->diffInSeconds($attempt->blocked_until);
        }
        
        return 0;
    }

    /**
     * Check if the next attempt would exceed the rate limit
     */
    public static function wouldExceedLimit($ipAddress)
    {
        $attempt = self::where('ip_address', $ipAddress)->first();
        
        if (!$attempt) {
            return false; // First attempt is always allowed
        }
        
        // Check if last attempt was within rate limit window (5 minutes)
        $timeSinceLastAttempt = Carbon::now()->diffInMinutes($attempt->last_attempt_at);
        
        if ($timeSinceLastAttempt < 5) {
            // If this would be the 2nd attempt within 5 minutes, it would exceed the limit
            return $attempt->attempt_count >= 1;
        }
        
        return false; // Outside the window, so it's allowed
    }

    /**
     * Record a contact attempt
     */
    public static function recordAttempt($ipAddress, $email, $userAgent)
    {
        $attempt = self::where('ip_address', $ipAddress)->first();
        
        if ($attempt) {
            // Check if last attempt was within rate limit window (5 minutes)
            $timeSinceLastAttempt = Carbon::now()->diffInMinutes($attempt->last_attempt_at);
            
            if ($timeSinceLastAttempt < 5) {
                // Increment attempt count
                $attempt->increment('attempt_count');
                $attempt->last_attempt_at = Carbon::now();
                
                // Block if this is the 2nd attempt within 5 minutes
                if ($attempt->attempt_count >= 2) {
                    $attempt->blocked_until = Carbon::now()->addMinutes(15); // Block for 15 minutes
                }
                
                $attempt->save();
            } else {
                // Reset attempt count if outside window
                $attempt->update([
                    'attempt_count' => 1,
                    'last_attempt_at' => Carbon::now(),
                    'blocked_until' => null,
                    'email' => $email,
                    'user_agent' => $userAgent
                ]);
            }
        } else {
            // Create new attempt record
            self::create([
                'ip_address' => $ipAddress,
                'email' => $email,
                'user_agent' => $userAgent,
                'last_attempt_at' => Carbon::now(),
                'attempt_count' => 1
            ]);
        }
    }
}
