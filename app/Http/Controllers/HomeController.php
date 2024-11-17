<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home');
    }
}
