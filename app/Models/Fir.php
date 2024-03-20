<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Crypt;
use App\Models\Range;
use App\Models\Unit;

class Fir extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'range',
        'unit',
        'title',
        'title_mr',
        'title_hi',
        'file',
        'date',
        'user_id',
        // 'created_at',
        // 'updated_at',
    ];

    public function rangeRelation(){
        return $this->belongsTo(Range::class, 'range', 'id');
    }
    
    public function unitRelation(){
        return $this->belongsTo(Unit::class, 'unit', 'id');
    }
}
