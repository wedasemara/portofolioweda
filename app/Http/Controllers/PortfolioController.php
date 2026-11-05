<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        $settings = array_merge(
            config('cms.defaults', []),
            Setting::query()
                ->pluck('value', 'key')
                ->filter(fn ($value) => $value !== null)
                ->all()
        );

        $projects = Project::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $whatsappNumber = preg_replace('/\D+/', '', (string) ($settings['whatsapp_number'] ?? ''));
        $whatsappUrl = 'https://wa.me/'.$whatsappNumber.'?text='.urlencode((string) ($settings['whatsapp_message'] ?? ''));

        return view('portfolio', compact('settings', 'projects', 'whatsappUrl'));
    }
}
