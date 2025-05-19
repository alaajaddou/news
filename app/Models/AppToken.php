<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AppToken extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'app_id',
        'app_secret',
        'app_name',
        'description',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'app_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'last_used_at' => 'datetime',
    ];

    /**
     * Generate a new app token.
     *
     * @param string $appName
     * @param string|null $description
     * @return self
     */
    public static function generate(string $appName, ?string $description = null): self
    {
        Log::info("Generating new app token for: {$appName}");
        
        $appToken = new self();
        $appToken->app_name = $appName;
        $appToken->description = $description;
        $appToken->app_id = Str::random(32);
        $appToken->app_secret = Str::random(64);
        $appToken->status = 'active';
        $appToken->save();
        
        return $appToken;
    }

    /**
     * Validate app credentials.
     *
     * @param string $appId
     * @param string $appSecret
     * @return bool
     */
    public static function validate(string $appId, string $appSecret): bool
    {
        Log::info("Validating app token: {$appId}");
        
        $appToken = self::where('app_id', $appId)
            ->where('app_secret', $appSecret)
            ->where('status', 'active')
            ->first();
        
        if ($appToken) {
            $appToken->last_used_at = now();
            $appToken->save();
            return true;
        }
        
        Log::warning("Invalid app token attempt: {$appId}");
        return false;
    }

    /**
     * Revoke this app token.
     *
     * @return bool
     */
    public function revoke(): bool
    {
        Log::info("Revoking app token: {$this->app_id}");
        
        $this->status = 'revoked';
        return $this->save();
    }

    /**
     * Check if this token is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}