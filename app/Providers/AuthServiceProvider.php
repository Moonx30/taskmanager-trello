<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Workspace;
use App\Policies\WorkspacePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Workspace::class => WorkspacePolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}
