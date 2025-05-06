<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManagementController extends Controller
{
    public function adminList()
    {
        // Logic to list admins
        $role   = Role::where('name', 'Admin')->first();
        $roleID = $role->id;
        $admins = User::where('role_id', $roleID)->orderBy('updated_at', 'desc')->get();

        return view('backend.pages.admins.index', compact('admins'));
    }

    public function adminCreate()
    {
        // Logic to show create admin form
        return view('backend.pages.admins.create');
    }

    public function adminStore(Request $request)
    {
        // Logic to store new admin
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'status'                => 'required|in:active,inactive',
            'password'              => 'required|string|min:8|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        $admin           = new User();
        $admin->name     = $request->name;
        $name            = str_replace(' ', '_', $request->name);
        $admin->username = $name . "_" . rand(100, 999);
        $admin->email    = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->role_id  = Role::where('name', 'admin')->first()->id;
        $admin->status   = $request->status;
        $admin->save();

        return redirect()->route('admin.admins.list')->with('success', 'Admin created successfully.');
    }

    public function adminEdit($id)
    {
        // Logic to show edit admin form
        $admin = User::findOrFail($id);
        if (! $admin) {
            return redirect()->route('admin.admins.list')->with('error', 'Admin not found.');
        }
        $role   = Role::where('name', 'admin')->first();
        $roleID = $role->id;
        if ($admin->role_id != $roleID) {
            return redirect()->route('admin.admins.list')->with('error', 'Admin not found.');
        }

        return view('backend.pages.admins.edit', compact('admin'));
    }

    public function adminUpdate(Request $request, $id)
    {
        // Logic to update admin
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users,email,' . $id,
            'status'                => 'required|in:active,inactive',
            'password'              => 'nullable|string|min:8|same:password_confirmation',
            'password_confirmation' => 'nullable|string|min:8|same:password',
        ]);
        $admin = User::findOrFail($id);
        if (! $admin) {
            return redirect()->route('admin.admins.list')->with('error', 'Admin not found.');
        }
        if ($admin->name != $request->name) {
            $name            = str_replace(' ', '_', $request->name);
            $admin->username = $name . "_" . rand(100, 999);
        }

        $admin->name  = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->status = $request->status;
        $admin->save();

        return redirect()->route('admin.admins.list')->with('success', 'Admin updated successfully.');
    }

    public function adminDelete($id)
    {
        // Logic to delete admin
        $admin = User::findOrFail($id);
        if (! $admin) {
            return redirect()->route('admin.admins.list')->with('error', 'Admin not found.');
        }
        $admin->delete();
        return redirect()->route('admin.admins.list')->with('success', 'Admin deleted successfully.');
    }
}