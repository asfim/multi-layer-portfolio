<?php

namespace App\Services;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Education;
use App\Models\Experience;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Repositories\BlogRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\SectionRepository;
use App\Repositories\SkillRepository;
use App\Repositories\ThemeSettingRepository;

class PortfolioService
{
    public function __construct(
        protected PortfolioRepository $portfolioRepo,
        protected ThemeSettingRepository $themeRepo,
        protected SectionRepository $sectionRepo,
        protected ProjectRepository $projectRepo,
        protected SkillRepository $skillRepo,
        protected BlogRepository $blogRepo
    ) {}

    public function getFrontendData(): array
    {
        return [
            'portfolio' => $this->portfolioRepo->getFirst(),
            'theme' => $this->themeRepo->getActive(),
            'sections' => $this->sectionRepo->getActiveOrdered(),
            'projects' => $this->projectRepo->getAll(),
            'projectCategories' => $this->projectRepo->getCategories(),
            'skillCategories' => $this->skillRepo->getGroupedByCategory(),
            'experiences' => Experience::orderBy('order', 'asc')->get(),
            'educations' => Education::orderBy('order', 'asc')->get(),
            'certificates' => Certificate::orderBy('order', 'asc')->get(),
            'services' => Service::orderBy('order', 'asc')->get(),
            'testimonials' => Testimonial::orderBy('order', 'asc')->get(),
            'clients' => Client::orderBy('order', 'asc')->get(),
            'recentBlogs' => $this->blogRepo->getRecent(3),
            'galleryItems' => GalleryItem::orderBy('order', 'asc')->get(),
            'siteSettings' => SiteSetting::first(),
        ];
    }
}
