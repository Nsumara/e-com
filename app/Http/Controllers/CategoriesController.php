<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;

class CategoriesController extends Controller
{
    protected $view = "admin.categories.";
    public function index()
    {
        $categories = Categories::withCount('subcategories')->where('status', '0')->get();
        // dd($categories->toArray());
        return view($this->view.'all-categories', compact('categories'));

    }
    public function create()
    {
        $categories = Categories::whereNull('category_id')->get();
        return view($this->view . 'add-categories', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        Categories::create([
            'name' => $request->name,
            'category_id' => $request->category_id,

        ]);
        return redirect()->route('admin/admin-from')->with('Data Add Sucessfully');
    }

    public function edit(Request $request, $id)
    {
        $categories = Categories::whereNUll('category_id')->get();
        $category = Categories::find($id);
        // dd($category->toArray());
        return view($this->view . 'edit-categories', compact('categories', 'category'));
    }
    public function update(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->update();
        return redirect()->route('admin/all-categories');
    }

    public function destroy($id)
    {
        $user_id = Categories::find($id);
        $user_id->delete();
        return back()->with('Data dateled Sucessfully');
    }
}
