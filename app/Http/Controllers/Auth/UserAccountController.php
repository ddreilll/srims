<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Symfony\Component\HttpFoundation\Response;

class UserAccountController extends Controller
{
    public function __construct()
    {
        addHtmlClass('container', 'container-xxl');
    }

    public function overview()
    {
        return view('auth.user-account.view');
    }

    public function settings()
    {
        return view('auth.user-account.settings');
    }

    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.user-account.edit');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect()->route('account.settings')->with('message', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $request->avatar->storeAs('uploads/avatars', sprintf('%s_%s.%s', auth()->id(), time(), $request->avatar->extension()), 'local');
        }

        if ($request->avatar_remove) {
            $path = NULL;
        }

        $user = auth()->user();

        $user->update(array_merge($request->validated(), array("avatar" => $path)));

        return redirect()->route('account.settings')->with('message', __('global.update_profile_success'));
    }
}
