<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class UserManagementController extends Controller
{
    public function userList()
    {
        // Logic to list users
        $role   = Role::where('name', 'Customer')->first();
        $roleID = $role->id;
        $users  = User::where('role_id', $roleID)->orderBy('updated_at', 'desc')->get();
        return view('backend.pages.users.index', compact('users'));
    }

    public function userView($id)
    {
        // Logic to view user details
        $user = User::findOrFail($id);
        if (! $user) {
            return redirec()->route('admin.users.list')->with('error', 'User was not found');
        }
        return view('backend.pages.users.view', compact('user'));
    }
    public function userStatus($id)
    {
        // Logic to change user status
        $user = User::findOrFail($id);
        if ($user->status == 'active') {
            $user->status = 'inactive';
        } else {
            $user->status = 'active';
        }
        $user->save();
        return redirect()->route('admin.users.list')->with('success', 'User status updated successfully.');
    }
}
