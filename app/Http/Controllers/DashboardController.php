<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()  {
        $notifications = auth()->user()->notifications; // Get
        return view('pages.home.index', [
            'notifications' => auth()->user()->notifications
        ]);
    }
}
