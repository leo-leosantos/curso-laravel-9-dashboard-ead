<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplaySupport extends Model
{
    use HasFactory;
    public $incrementing = false;

    protected $table = 'reply_support';

    protected $fillable = ['user_id','admin_id','support_id','description'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function support()
    {
        return $this->belongsTo(Support::class);
    }

}
