<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class csv extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_name',
        'file_name',
        'colomn',
    ];
    public function getCreatedAtAttribute($value)
    {
        // Custom logic to modify the created_at value before returning it
        return date('Y-m-d', strtotime($value));
    }
}
