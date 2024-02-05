<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController
{
    function show()
    {
        return Inertia::render('Dashboard');
    }
}
