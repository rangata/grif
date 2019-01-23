<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $menu = ['a','b'];
        $menu = collect($menu);

        return view('admin.sidebar', compact('menu'));
    }
}
