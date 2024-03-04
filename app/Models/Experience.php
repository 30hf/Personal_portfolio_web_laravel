<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'position',
        'name_company',
        'location_company',
        'desc',
        'time_joined',
        'time_out',
    ];
}
