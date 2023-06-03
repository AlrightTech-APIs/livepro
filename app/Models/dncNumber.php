<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dncNumber extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
    ];

}
