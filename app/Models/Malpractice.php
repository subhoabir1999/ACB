<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use App\Models\MalpracticesDept;

class Malpractice extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'title_mr',
        'title_hi',
        'from_date',
        'to_date',
        'file',
        'dept',
        'user_id',
        // 'created_at',
        // 'updated_at',
    ];

    public function department(){
        return $this->belongsTo(MalpracticesDept::class, 'dept', 'id');
    }
}
