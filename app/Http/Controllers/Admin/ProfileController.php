<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255',],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
        ]);

        $oldImage = $request->old_avatar;
        if ($request->file('avatar')) {
            $image = $request->file('avatar');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(500, 500);
            $img->toJpeg(80)->save(base_path('public/uploads/profile_image/' . $name_gen));
            $save_url = 'uploads/profile_image/' . $name_gen;

            $user = Auth::user();
            $user->avatar = $save_url;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->back();
        } else {
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:5', 'confirmed']
        ], [
            'current_password.current_password' => 'Current Password is invalid!',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        toastr()->success('Password Updated Successfully');

        return redirect()->back();
    }
}
