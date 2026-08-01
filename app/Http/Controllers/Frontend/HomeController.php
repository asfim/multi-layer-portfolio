<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\PortfolioService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(protected PortfolioService $portfolioService) {}

    public function index(): View
    {
        $data = $this->portfolioService->getFrontendData();
        $layout = $data['theme']->active_layout ?? 'layout1_developer';

        // Check if template view exists, fallback to layout1_developer
        $viewName = "frontend.templates.{$layout}.index";
        if (! view()->exists($viewName)) {
            $viewName = 'frontend.templates.layout1_developer.index';
        }

        return view($viewName, $data);
    }
}
