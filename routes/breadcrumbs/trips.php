<?php

Breadcrumbs::for('dashboard.trips.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('trips.plural'), route('dashboard.trips.index'));
});

Breadcrumbs::for('dashboard.trips.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.trips.index');
    $breadcrumb->push(trans('trips.actions.create'), route('dashboard.trips.create'));
});

Breadcrumbs::for('dashboard.trips.show', function ($breadcrumb, $trip) {
    $breadcrumb->parent('dashboard.trips.index');
    $breadcrumb->push($trip->id, route('dashboard.trips.show', $trip));
});

Breadcrumbs::for('dashboard.trips.edit', function ($breadcrumb, $trip) {
    $breadcrumb->parent('dashboard.trips.show', $trip);
    $breadcrumb->push(trans('trips.actions.edit'), route('dashboard.trips.edit', $trip));
});
