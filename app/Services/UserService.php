<?php


namespace App\Services;


use App\Http\Requests\ChangeAvatarRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Services\Interfaces\UserServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserService extends Service implements UserServiceInterface
{
    public function resizeImage($img, $width, $height, $userId)
    {
        $img = Image::make($img);
        $img->fit($width, $height);

        $path = 'images/'.$width.'x'.$height.'/'.$userId.'_'.Carbon::now()->toDateTimeString().'.jpg';
        $img->save(storage_path('app/public/'.$path));

        return 'storage/'.$path;
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        return $user->update([
            User::COL_NAME => $request->input(User::COL_NAME),
            User::COL_SPECIALTY => $request->input(User::COL_SPECIALTY),
            User::COL_LEVEL => $request->input(User::COL_LEVEL),
        ]);
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function changePassword(ChangePasswordRequest $request, $userId, $oldPassword)
    {
        if (Hash::check($request->input('oldPassword'), $oldPassword))
        {
            $user = User::find($userId);
            return $user->update([
                User::COL_PASSWORD => Hash::make($request->input('newPassword')),
            ]);
        }
        else
        {
            return false;
        }
    }

    public function changeAvatar(ChangeAvatarRequest $request, $userId) {
        $user = User::find($userId);


        if ($request->hasFile('avatar'))
        {
            $avatar = $this->resizeImage($request->avatar, 150, 150, $userId);

            return $user->update([
                User::COL_AVATAR => $avatar,
            ]);
        }
        else
        {
            return false;
        }
    }
}
