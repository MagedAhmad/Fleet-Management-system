@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('active', request()->routeIs('dashboard.home'))
@endcomponent

@include('dashboard.accounts.sidebar')

@component('dashboard::components.sidebarItem')
    @slot('url', route('dashboard.settings.index'))
    @slot('name', trans('settings.plural'))
    @slot('icon', 'fas fa-cog')
    @slot('can', ['ability' => 'viewAny', 'model' => \App\Models\Setting::class])
    @slot('active', request()->routeIs('dashboard.settings.index'))
@endcomponent
