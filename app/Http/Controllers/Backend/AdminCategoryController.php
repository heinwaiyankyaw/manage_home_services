<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function categoryList()
    {
        // Logic to list categories
        $categories = Category::orderBy('updated_at', 'desc')->get();
        return view('backend.pages.category.index', compact('categories'));
    }

    public function categoryCreate()
    {
        // Logic to show create category form
        return view('backend.pages.category.create');
    }

    public function categoryStore(Request $request)
    {
        // Logic to store new category
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required',
        ]);
        // Assuming Category is a model
        Category::create($request->all());
        return redirect()->route('admin.category.list');
    }

    public function categoryEdit($id)
    {
        // Logic to show edit category form
        // Assuming Category is a model
        $category = Category::findOrFail($id);
        return view('backend.pages.category.edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        // Logic to update category
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        // Assuming Category is a model
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('backend.pages.category.index');
    }

    public function categoryDelete($id)
    {
        // Assuming Category is a model
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.list')->with('success', 'Category deleted successfully');
    }

}
