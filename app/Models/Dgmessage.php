<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dgmessage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'name_mr',
        'name_hi',
        'post',
        'post_mr',
        'post_hi',
        'photo',
        'about',
        'about_mr',
        'about_hi',
    ];
}
