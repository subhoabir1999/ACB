<?php

// app/Models/Headline.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_mr',
        'title_hi',
        'priority',
        'link',
        'file',
        'user_id',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

