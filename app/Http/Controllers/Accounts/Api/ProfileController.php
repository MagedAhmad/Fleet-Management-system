<?php

namespace App\Http\Controllers\Accounts\Api;

use App\Http\Requests\Accounts\Api\CompleteProfileRequest;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Accounts\Api\ProfileRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProfileController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display the authenticated user resource.
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function show()
    {
        return auth()->user()->getResource();
    }

    public function search(Request $request)
    {
        $users = User::filter()->paginate();

        return Response()->json([
            'data' => $users,
        ]);
    }

    /**
     * Update the authenticated user profile.
     *
     * @param \App\Http\Requests\Accounts\Api\ProfileRequest $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function update(ProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->allWithHashedPassword());

        return $user->getResource();
    }

    /**
     * Update the authenticated user profile.
     *
     * @param \App\Http\Requests\Accounts\Api\ProfileRequest $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function complete(CompleteProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->allWithHashedPassword());

        return $user->getResource();
    }
}
