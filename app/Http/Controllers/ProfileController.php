<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAvatarRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }

    public function get()
    {
        $user = $this->userService->getUserById(Auth::id());

        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        if ($this->userService->update($request, Auth::id()))
        {
            return redirect()->route('profile.get')->with(['success' => __('profile.successUpdateProfile')]);
        }
        else
        {
            return redirect()->route('profile.get')->withErrors(['message' => __('profile.failedUpdateProfile')]);
        }
    }

    public function changePassword(ChangePasswordRequest $request) {
        $userId = Auth::id();
        $oldPassword = Auth::user()->password;

        if($this->userService->changePassword($request, $userId, $oldPassword)) {
            return redirect()->route('profile.get')->with(['success' => __('profile.successChangePassword')]);
        } else {
            return redirect()->route('profile.get')->withErrors(['message' => __('profile.failedChangePassword')]);
        }
    }

    public function changeAvatar(ChangeAvatarRequest $request) {
        $userId = Auth::id();

        if ($this->userService->changeAvatar($request, $userId)) {
            return redirect()->route('profile.get')->with(['success' => __('profile.successChangeAvatar')]);
        } else {
            return redirect()->route('profile.get')->withErrors(['message' => __('profile.failedChangeAvatar')]);
        }
    }
}
