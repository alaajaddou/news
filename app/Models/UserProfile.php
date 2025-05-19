<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'phone',
        'gender',
        'bio',
        'avatar',
        'country',
        'city',
        'address',
        'postal_code',
        'birth_date',
        'social_links',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'social_links' => 'array',
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the avatar URL.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if (!$this->avatar) {
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->full_name ?: $this->user->name) . '&color=7F9CF5&background=EBF4FF';
        }

        if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            return $this->avatar;
        }

        return Storage::url($this->avatar);
    }

    /**
     * Update the avatar.
     *
     * @param \Illuminate\Http\UploadedFile|null $file
     * @return string|null
     */
    public function updateAvatar($file)
    {
        if (!$file) {
            return null;
        }

        Log::info("Updating avatar for user: {$this->user_id}");

        // Delete old avatar if it exists and is not a URL
        if ($this->avatar && !filter_var($this->avatar, FILTER_VALIDATE_URL)) {
            Storage::delete($this->avatar);
        }

        // Store the new avatar
        $path = $file->store('avatars', 'public');
        $this->avatar = $path;
        $this->save();

        return $path;
    }

    /**
     * Get the age of the user.
     *
     * @return int|null
     */
    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    /**
     * Get a specific social link.
     *
     * @param string $platform
     * @return string|null
     */
    public function getSocialLink(string $platform)
    {
        return data_get($this->social_links, $platform);
    }

    /**
     * Set a specific social link.
     *
     * @param string $platform
     * @param string $url
     * @return $this
     */
    public function setSocialLink(string $platform, string $url)
    {
        Log::info("Setting social link for platform: {$platform}, user: {$this->user_id}");
        
        $socialLinks = $this->social_links ?? [];
        data_set($socialLinks, $platform, $url);
        $this->social_links = $socialLinks;
        
        return $this;
    }
}