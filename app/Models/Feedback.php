<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class Feedback extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'message',
        'type',
        'rating',
        'page_url',
        'browser',
        'os',
        'status',
        'admin_notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * Get the user that owns the feedback.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include feedback of a specific type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Scope a query to only include feedback with a specific status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include feedback with a minimum rating.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $rating
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMinRating($query, int $rating)
    {
        return $query->where('rating', '>=', $rating);
    }

    /**
     * Update the status of the feedback.
     *
     * @param string $status
     * @param string|null $adminNotes
     * @return bool
     */
    public function updateStatus(string $status, ?string $adminNotes = null): bool
    {
        Log::info("Updating feedback status to {$status} for feedback ID: {$this->id}");
        
        $this->status = $status;
        
        if ($adminNotes) {
            $this->admin_notes = $adminNotes;
        }
        
        return $this->save();
    }

    /**
     * Get the formatted rating as stars.
     *
     * @return string
     */
    public function getStarRatingAttribute(): string
    {
        $rating = $this->rating ?? 0;
        $stars = str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
        return $stars;
    }
}