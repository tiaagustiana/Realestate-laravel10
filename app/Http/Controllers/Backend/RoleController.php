<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission() {
        $permissions = Permission::all();

        return view('backend.pages.permission.all-permission', compact('permissions'));
    }

    public function AddPermission() {
        return view('backend.pages.permission.add-permission');
    }

    public function StorePermission(Request $request) {
        $permissions = Permission::create([
            'name'          => $request->name,
            'group_name'    => $request->group_name
        ]);
        return redirect()->route('all.permission')->with('success', 'Permission Create Successfully!');
    }

    public function EditPermission($id) {
        $permissions = Permission::findOrFail($id);
        return view('backend.pages.permission.edit-permission', compact('permissions'));
    }

    public function UpdatePermission(Request $request) {

        $permission_id = $request->id;

        Permission::findOrFail($permission_id)->update([
            'name'          => $request->name,
            'group_name'    => $request->group_name
        ]);
        return redirect()->route('all.permission')->with('success', 'Permission Update Successfully!');
    }

    public function DeletePermission($id) {
        Permission::findOrFail($id)->delete();
        return redirect()->route('all.permission');
    }
}
