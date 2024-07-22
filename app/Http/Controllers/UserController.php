<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function Index() {
        return view('frontend.index');

    }

    public function UserProfile() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.dashboard.edit-profile', compact('userData'));
    }

    public function UserProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/user-images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user-images/'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        // with sweetalert
        return redirect()->back()->with('success', 'User Profile Updated Successfully!');
    }

    public function UserLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('logout','User Logout Successfully');
    }

    public function UserChangePassword() {
        return view('frontend.dashboard.change-password');
    }

    public function UserPasswordUpdate(Request $request) {
        // validasi
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        // pencocokan password lama
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return redirect()->back()->with('error', 'Old Password Does Not Match!');
        }
        // update password baru
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with('success', 'Password Change Successfully!');

    }
}
