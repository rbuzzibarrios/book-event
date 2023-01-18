<?php

namespace App\Http\Controllers;

use Inertia\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return inertia('WelcomeBookEvent');
    }
}