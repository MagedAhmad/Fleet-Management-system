<?php

Breadcrumbs::for('dashboard.bookings.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('bookings.plural'), route('dashboard.bookings.index'));
});

Breadcrumbs::for('dashboard.bookings.show', function ($breadcrumb, $booking) {
    $breadcrumb->parent('dashboard.bookings.index');
    $breadcrumb->push($booking->id, route('dashboard.bookings.show', $booking));
});
