<?php

namespace App\Http\Controllers\Settings\Api;

use App\Http\Controllers\Controller;
use Laraeast\LaravelSettings\Facades\Settings;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response()->json([
            'data' => [
                'title' => Settings::locale()->get('title'),
                'contacts' => [
                    'phones' => Settings::get('phones'),
                    'email' => Settings::get('email'),
                ],
                'social' => [
                    'facebook' => Settings::get('facebook'),
                    'twitter' => Settings::get('twitter'),
                    'linkedin' => Settings::get('linkedin'),
                    'instagram' => Settings::get('instagram'),
                    'snapchat' => Settings::get('snapchat'),
                    'youtube' => Settings::get('youtube'),
                ],
            ],
        ]);
    }
}
