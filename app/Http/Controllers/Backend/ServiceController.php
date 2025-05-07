<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    // List all services
    public function providerServiceList()
    {
        $userID   = auth()->user()->id;
        $services = Service::where('user_id', $userID)->orderBy('updated_at', 'desc')->get();
        return view('provider.pages.service.index', compact('services'));
    }

    // Show the create service form
    public function providerServiceCreate()
    {
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('provider.pages.service.store', compact('categories'));
    }

    // Store a new service
    public function providerServiceStore(Request $request)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required',
            'duration'    => 'required|min:1',
            'price'       => 'required|numeric|min:100',
            'status'      => 'required',
        ]);

        $service              = new Service();
        $service->name        = $validatedData['name'];
        $service->user_id     = Auth::user()->id;
        $service->description = $validatedData['description'];
        $service->price       = $validatedData['price'];
        $service->duration    = $validatedData['duration'];
        $service->save();

        return redirect()->route('provider.services.list')->with('success', 'Service created successfully.');
    }

    // Show the edit service form
    public function providerServiceEdit($id)
    {
        $service    = Service::findOrFail($id);
        $categories = Category::orderBy('updated_at', 'desc')->get();

        return view('provider.pages.service.edit', compact('service', 'categories'));
    }

    // Update an existing service
    public function providerServiceUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'duration'    => 'required',
            'category_id' => 'required',
        ]);

        $service              = Service::findOrFail($id);
        $service->name        = $validatedData['name'];
        $service->description = $validatedData['description'];
        $service->price       = $validatedData['price'];
        $service->duration    = $validatedData['duration'];
        $service->category_id = $validatedData['category_id'];
        $service->save();

        return redirect()->route('provider.services.list')->with('success', 'Service updated successfully.');
    }

    // Delete a service
    public function providerServiceDelete($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('provider.services.list')->with('success', 'Service deleted successfully.');
    }
}