<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index(string $successMessage = null) {
        return view('dashboard')->with(compact($successMessage));
    }
}
