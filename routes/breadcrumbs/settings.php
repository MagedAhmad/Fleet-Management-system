<?php

// Home / settings
Breadcrumbs::register('dashboard.settings.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('settings.plural'), route('dashboard.settings.index'));
});
