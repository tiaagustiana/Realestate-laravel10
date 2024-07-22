<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard() {
        return view('admin.index');
    }

    public function AdminLogin() {
        return view('admin.admin-login');
    }
    public function AdminLogout (Request $request) {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // return redirect('/admin/login');
        return redirect('/admin/login')->with('logout', 'Logout Successfully');
    }

    public function AdminProfile() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin-profile-view', compact('profileData'));
    }

    public function AdminProfileStore(Request $request) {

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
            @unlink(public_path('upload/admin-images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin-images/'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        // with sweetalert
        return redirect()->back()->with('success', 'Admin Profile Updated Successfully!');
    }

    public function AdminChangePassword() {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('admin.admin-change-password', compact('profileData'));
    }

    public function AdminUpdatePassword(Request $request) {
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

    public function AllAgent () {
        $allagent = User::where('role','agent')->get();

        return view('backend.agentuser.all-agent',compact('allagent'));
    }

    public function AddAgent(){

        return view('backend.agentuser.add-agent');
      }

      public function StoreAgent(Request $request){

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'active',
        ]);

            return redirect()->route('all.agent')->with('success', 'Agent Created Successfully');
      }

      public function EditAgent($id) {
        $allagent = User::findOrFail($id);

        return view('backend.agentuser.edit-agent',compact('allagent'));
      }

      public function UpdateAgent(Request $request) {
        $user_id = $request->id;

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

            return redirect()->route('all.agent')->with('success', 'Agent Updated Successfully');
      }

      public function DeleteAgent($id) {
        User::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Agent Deleted Successfully');
      }

      public function changeStatus(Request $request) {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status Change Successfully']);
      }
}
