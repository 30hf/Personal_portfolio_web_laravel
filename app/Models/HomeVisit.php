<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeVisit extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
        'image',
        'description',
        'url_insta',
        'url_github',
        'url_linked',
    ];
}
