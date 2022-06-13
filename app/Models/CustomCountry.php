<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCountry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'population',
        'demonym',
        'religion',
        'description',
    ];
}
