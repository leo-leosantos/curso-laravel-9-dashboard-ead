<?php

namespace App\Observers;

use App\Models\ReplaySupport;
use Illuminate\Support\Str;

class ReplySupportObserver
{
    /**
     * Handle the Admin "creating" event.
     *
     * @param  \App\Models\ReplaySupport  $replaySupport
     * @return void
     */
    public function creating(ReplaySupport $replaySupport)
    {
        $replaySupport->admin_id = auth()->user()->id;
       // $replaySupport->user_id = 'bcb54cb3-2708-4e89-bb4c-050ed1f35d97';
        $replaySupport->id = Str::uuid();
    }
}
