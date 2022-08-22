<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    //UuidTrait;


    protected $fillable = ['course_id', 'name'];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'id'=> 'string'
    ];

    public $incrementing = false;
    // public static function booted()
    // {
    //     static::created(function (Model $model) {
    //         $model->id = Str::uuid();
    //     });
    // }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }




}
