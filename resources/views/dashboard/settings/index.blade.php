<x-layout :title="trans('settings.plural')" :breadcrumbs="['dashboard.settings.index']">
        {{ BsForm::resource('settings')->put(route('dashboard.settings.update')) }}
            @component('dashboard::components.box')

        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">@lang('settings.tabs.main')</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">@lang('settings.tabs.social')</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane fade active show" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    {{ BsForm::text('title')->value(Settings::get('title'))->maxlength(255) }}
                    {{ BsForm::text('phones[]')->value(Settings::get('phones')[0] ?? '') }}
                    {{ BsForm::text('email')->value(Settings::get('email')) }}
                    {{ BsForm::text('about')->value(Settings::get('about')) }}
                    {{ BsForm::text('footer')->value(Settings::get('footer')) }}
                </div>
                <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                    {{ BsForm::text('facebook')->value(Settings::get('facebook')) }}
                    {{ BsForm::text('twitter')->value(Settings::get('twitter')) }}
                    {{ BsForm::text('linkedin')->value(Settings::get('linkedin')) }}
                    {{ BsForm::text('instagram')->value(Settings::get('instagram')) }}
                    {{ BsForm::text('snapchat')->value(Settings::get('snapchat')) }}
                    {{ BsForm::text('youtube')->value(Settings::get('youtube')) }}
                </div>
            </div>
        </div>
        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot

        @slot('footer')
            {{ BsForm::submit()->label(trans('settings.actions.save')) }}
        @endslot
    @endcomponent
{{ BsForm::close() }}
</x-layout>
