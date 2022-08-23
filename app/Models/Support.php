<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['status','description','user_id','lesson_id'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
    ];


    //relacionamentos

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function replies()
    {
        return $this->hasMany(ReplaySupport::class);
    }
}
