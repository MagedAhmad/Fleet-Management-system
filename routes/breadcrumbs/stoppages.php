<?php

Breadcrumbs::for('dashboard.stoppages.index', function ($breadcrumb, $trip) {
    $breadcrumb->parent('dashboard.trips.show', $trip);
    $breadcrumb->push(trans('stoppages.plural'), route('dashboard.stoppages.index', $trip));
});

Breadcrumbs::for('dashboard.stoppages.create', function ($breadcrumb, $trip) {
    $breadcrumb->parent('dashboard.stoppages.index', $trip);
    $breadcrumb->push(trans('stoppages.actions.create'), route('dashboard.stoppages.create', $trip));
});

Breadcrumbs::for('dashboard.stoppages.show', function ($breadcrumb, $trip, $stoppage) {
    $breadcrumb->parent('dashboard.stoppages.index');
    $breadcrumb->push($stoppage->id, route('dashboard.stoppages.show', [$trip, $stoppage]));
});

