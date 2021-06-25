<?php

namespace App\Http\Controllers\Settings\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('update', Setting::class);

        return view("dashboard.settings.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', Setting::class);

        $files = [
            'cv',
        ];

        foreach ($request->except(array_merge(['_token', '_method', 'media'], $files)) as $key => $value) {
            Settings::set($key, $value);
        }

        foreach ($files as $file) {
            Settings::set($file)->addAllMediaFromTokens([], $file);
        }

        flash(trans('settings.messages.updated'));

        return back();
    }
}
