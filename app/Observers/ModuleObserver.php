<?php

namespace App\Observers;

use App\Models\Module;
use Illuminate\Support\Str;

class ModuleObserver
{
    /**
     * Handle the Admin "creating" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function creating(Module $module)
    {
        $module->id = Str::uuid();
    }
}
