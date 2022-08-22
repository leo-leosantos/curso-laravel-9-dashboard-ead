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


    protected $fillable = ['module_id','name', 'url', 'video', 'description'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }



}
