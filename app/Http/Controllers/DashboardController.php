<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'items' => Item::count(),
            'categories' => Category::count(),
            'logs' => Log::count(),
        ];

        return view('dashboard', compact('counts'));
    }
}
