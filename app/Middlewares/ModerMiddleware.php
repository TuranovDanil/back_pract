<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class ModerMiddleware
{
    public function handle(Request $request)
    {
        if (Auth::check() && Auth::user()->isWorker()) {
            app()->route->redirect('/discipline');
        }
    }
}
