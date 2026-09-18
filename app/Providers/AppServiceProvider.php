<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Certification;
use App\Models\Language;
use App\Observers\PortfolioObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        require_once app_path('helpers.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register observers to clear chatbot cache when portfolio data changes

        Profile::observe(PortfolioObserver::class);
        Skill::observe(PortfolioObserver::class);
        Project::observe(PortfolioObserver::class);
        Experience::observe(PortfolioObserver::class);
        Education::observe(PortfolioObserver::class);
        Certification::observe(PortfolioObserver::class);
        Language::observe(PortfolioObserver::class);
    }
}