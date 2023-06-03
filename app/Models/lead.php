<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'original_name',
        'file_name',
        'colomn',
    ];
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
    public function numbers()
    {
        return $this->hasMany(leadNumber::class,'lead_id','id');
    }
}
