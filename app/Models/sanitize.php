<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanitize extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'original_name',
        'file_name',
        'colomn',
    ];
    public function getCreatedAtAttribute($value)
    {
        // Custom logic to modify the created_at value before returning it
        return date('Y-m-d', strtotime($value));
    }
    /**
     * Get the user that owns the sanitize
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
