<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'id'=> 'string'
    ];

    public $incrementing = false;

    protected $fillable = ['module_id','name', 'description','url', 'video', ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }



}
