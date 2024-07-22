<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function AgentDashboard() {
        return view('agent.index');
    }

    public function AgentLogin() {
        return view('agent.agent-login');
    }

    public function AgentRegister(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'inactive',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::AGENT);
    }

    public function AgentLogout(Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/agent/login');
        return redirect('/agent/login')->with('logout', 'Logout Successfully');
    }

    public function AgentProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('agent.agent-profile-view', compact('profileData'));
    }

    public function AgentProfileStore(Request $request) {
        $request->validate([
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->phone    = $request->phone;
        $data->address  = $request->address;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/agent-images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/agent-images/'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        // with sweetalert
        return redirect()->back()->with('success', 'Agent Profile Updated Successfully!');
    }

    public function AgentChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('agent.agent-change-password', compact('profileData'));
    }

    public function AgentUpdatePassword(Request $request) {
        // validasi
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);
        // pencocokan password dulu
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return redirect()->back()->with('error', 'Password does not match!');
        }
        // update password baru
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return redirect()->back()->with('success', 'Password Change Successfully!');
    }
}
