<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderManagementController extends Controller
{
    public function providerList()
    {
        $role      = Role::where('name', 'Service Provider')->first();
        $roleID    = $role->id;
        $providers = User::where('role_id', $roleID)->orderBy('updated_at', 'desc')->get();

        // Logic to list providers
        return view('backend.pages.providers.index', compact('providers'));
    }

    public function providerCreate()
    {
        // Logic to show create provider form
        return view('backend.pages.providers.create');
    }

    public function providerStore(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'status'                => 'required|in:active,inactive',
            'password'              => 'required|string|min:8|same:password_confirmation',
            'password_confirmation' => 'required|string|min:8|same:password',
        ]);

        $provider           = new User();
        $provider->name     = $request->name;
        $name               = str_replace(' ', '_', $request->name);
        $provider->username = $name . "_" . rand(100, 999);
        $provider->email    = $request->email;
        $provider->password = Hash::make($request->password);
        $provider->role_id  = Role::where('name', 'Service Provider')->first()->id;
        $provider->status   = $request->status;
        $provider->save();

        // Logic to store new provider
        return redirect()->route('admin.providers.list')->with('success', 'Provider created successfully.');
    }

    public function providerEdit($id)
    {
        // Logic to show edit provider form
        $provider = User::findOrFail($id);
        if (! $provider) {
            return redirect()->route('admin.providers.list')->with('error', 'Provider not found.');
        }
        $role   = Role::where('name', 'Service Provider')->first();
        $roleID = $role->id;
        if ($provider->role_id != $roleID) {
            return redirect()->route('admin.providers.list')->with('error', 'Provider not found.');
        }

        return view('backend.pages.providers.edit', compact('provider'));
    }

    public function providerUpdate(Request $request, $id)
    {
        // Logic to update provider
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users,email,' . $id,
            'status'                => 'required|in:active,inactive',
            'password'              => 'nullable|string|min:8|same:password_confirmation',
            'password_confirmation' => 'nullable|string|min:8|same:password',
        ]);
        $provider = User::findOrFail($id);
        if (! $provider) {
            return redirect()->route('admin.providers.list')->with('error', 'Admin not found.');
        }
        if ($provider->name != $request->name) {
            $name               = str_replace(' ', '_', $request->name);
            $provider->username = $name . "_" . rand(100, 999);
        }

        $provider->name = $request->name;

        $provider->email = $request->email;
        if ($request->password) {
            $provider->password = Hash::make($request->password);
        }
        $provider->status = $request->status;
        $provider->save();

        return redirect()->route('admin.providers.list')->with('success', 'Provider updated successfully.');
    }

    public function providerDelete($id)
    {
        // Logic to delete provider
        $provider = User::findOrFail($id);
        if (! $provider) {
            return redirect()->route('admin.providers.list')->with('error', 'Provider not found.');
        }
        $provider->delete();
        return redirect()->route('admin.providers.list')->with('success', 'Provider deleted successfully.');
    }

}