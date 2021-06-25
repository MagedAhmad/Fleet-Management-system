<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCompleteData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //check required data of user
        if (! auth()->user()->phone || ! auth()->user()->country_id || ! auth()->user()->city_id || ! auth()->user()->area_id) {
            return response([
                'message' => trans('auth.missing_data'),
            ], 403);
        }
        //return message if fail 403
        //continue if done

        return $next($request);
    }
}
