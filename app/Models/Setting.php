<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
        'display_name',
        'category',
        'description',
        'value',
        'type',
        'options',
        'is_public',
        'is_system',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'value' => 'array',
        'options' => 'array',
        'is_public' => 'boolean',
        'is_system' => 'boolean',
    ];

    /**
     * Get a setting value by key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function getValue(string $key, $default = null)
    {
        Log::info("Getting setting value for key: {$key}");
        
        return Cache::remember("setting.{$key}", 60 * 60, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value by key.
     *
     * @param string $key
     * @param mixed $value
     * @param array $attributes Additional attributes to update
     * @return Setting
     */
    public static function setValue(string $key, $value, array $attributes = [])
    {
        Log::info("Setting value for key: {$key}");
        
        $setting = self::firstOrNew(['key' => $key]);
        $setting->value = $value;
        
        foreach ($attributes as $attr => $attrValue) {
            $setting->{$attr} = $attrValue;
        }
        
        $setting->save();
        
        // Clear the cache for this key
        Cache::forget("setting.{$key}");
        
        return $setting;
    }

    /**
     * Get all settings by category.
     *
     * @param string $category
     * @param bool $publicOnly
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getByCategory(string $category, bool $publicOnly = false)
    {
        Log::info("Getting settings for category: {$category}, publicOnly: " . ($publicOnly ? 'true' : 'false'));
        
        $query = self::where('category', $category);
        
        if ($publicOnly) {
            $query->where('is_public', true);
        }
        
        return $query->get();
    }
}