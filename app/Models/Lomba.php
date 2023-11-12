<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lomba extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'categories',
        'description',
        'image',
        'is_favorite',
        'is_remind',
    ];

}
