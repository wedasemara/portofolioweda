<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view('dashboard.index', [
            'projectCount' => Project::query()->count(),
            'publishedCount' => Project::query()->where('is_published', true)->count(),
            'recentProjects' => Project::query()->latest()->take(5)->get(),
        ]);
    }
}
