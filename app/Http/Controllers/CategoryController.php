<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categories = Category::all();
        $categories = Category::paginate(5);
        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('category_created', 'New category has been inserted successfully!');
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);
        if($category != null)
        {
            return view('category.edit')->with('category', $category);
        }
        else 
        {
            Session::flash('category_notfound', 'This category with id '.$id.' not have in our database!');
            return redirect('/category');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required|max:255|min:2',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        Session::flash('category_updated', 'The category with '.$request->name.' has been updated successfully!');
        return redirect('/category/'.$id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        if($category != null)
        {
            $category->delete();
            Session::flash('category_deleted', 'Category has been deleted successfully!');
            return redirect('/category');
        }
        else 
        {
            Session::flash('category_deleted', 'Oop sorry this id'.$id.' is not have in our database!');
            return redirect('/category');
        }
    }
}
