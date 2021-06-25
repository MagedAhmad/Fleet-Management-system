<x-layout :title="trans('dashboard.home')" :breadcrumbs="['dashboard.home']">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    @include('dashboard::components.info-box', [
                        'icon_color' => 'blue',
                        'icon' => 'fa fa-users',
                        'text' => trans('users.plural'),
                        'number' => number_format($customersCount),
                    ])
                </div>
                
            </div>
        </div>
    </div>
</x-layout>
