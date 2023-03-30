<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class ModerMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::check() || !Auth::user()->isModer() && Auth::check() && !Auth::user()->isAdmin()) {
            app()->route->redirect('/discipline');
        }
    }
}