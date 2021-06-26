@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.accounts.sidebar')

@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.stations.index'))
    @slot('name', trans('stations.plural'))
    @slot('icon', 'fas fa-bus')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Station::class])
    @slot('active', request()->routeIs('dashboard.stations.index'))
@endcomponent

@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.trips.index'))
    @slot('name', trans('trips.plural'))
    @slot('icon', 'fa fa-plane')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Trip::class])
    @slot('active', request()->routeIs('dashboard.trips.index'))
@endcomponent


@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.settings.index'))
    @slot('name', trans('settings.plural'))
    @slot('icon', 'fas fa-cog')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Setting::class])
    @slot('active', request()->routeIs('dashboard.settings.index'))
@endcomponent
