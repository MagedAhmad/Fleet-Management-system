<?php

namespace App\Providers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Feedback;
use App\Models\Hospital;
use App\Models\Pharmacy;
use App\Models\BeautyCenter;
use App\Policies\AreaPolicy;
use App\Policies\CityPolicy;
use App\Models\AnalysisCenter;
use App\Policies\BeautyPolicy;
use App\Policies\CountryPolicy;
use App\Policies\AnalysisPolicy;
use App\Policies\FeedbackPolicy;
use App\Policies\HospitalPolicy;
use App\Policies\PharmacyPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return '\App\Policies\\'.class_basename($modelClass).'Policy';
        });
    }
}
