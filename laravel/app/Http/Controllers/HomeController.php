<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View; // Import View class

class HomeController extends Controller
{
    public function index(): View
    {
        return view(
            'home.index',
            [
                'title' => 'Homepage',
            ]
        );
    }
}
