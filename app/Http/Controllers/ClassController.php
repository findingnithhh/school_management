<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $classes = Classes::paginate(10);
        // $classes = Classes::all(); 
        return view('class.index')->with('classes', $classes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = array();
        foreach(Category::all() as $category)
        {
            $categories[$category->id] = $category->name;
        }
        return view('class.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate data before create
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255|min:1',
            'status' => 'required',
        ]);

        $classes = new Classes;
        $classes->category_id = $request->Input('category_id');
        $classes->name = $request->Input('name');
        $classes->status = $request->Input('status');
        $classes->save();
        Session::flash('class_created', 'New class has been created succssfully!');
        return redirect('/class/create');
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
        $categories = array();
        foreach (Category::all() as $category) {
            $categories[$category->id] = $category->name;
        }
        // edit class by ID
        $classes = Classes::find($id);
        return view('class.edit')->with('classes', $classes)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255|min:1',
            'status' => 'required', 
        ]);

        $classes = Classes::find($id);
        $classes->category_id = $request->category_id;
        $classes->name = $request->name;
        $classes->status = $request->status;
        $classes->save();
        Session::flash('class_updated', 'Class has been updated successfully!');
        return redirect('/class/' . $id . '/edit');

        // validate way 2

        // $validator = Validator::make($request->all(),[
        //     'created_id' => 'required',
        //     'name' => 'required|max:255|min:1',
        //     'status' => 'required',           
        // ]);
        // if($validator->fails()){
        //     return redirect('/class/' . $id . '/edit')->withInput()->withErrors($validator);
        // }

        // $classes = Classes::find($id);
        // $classes->created_id = $request->Input('created_id');
        // $classes->name = $request->Input('name');
        // $classes->status = $request->Input('status');
        // $classes->save();
        // Session::flash('class_updated', 'Class has been updated successfull!');
        // return redirect('/class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $classes = Classes::find($id);
        $classes->delete();
        Session::flash('class_deleted', 'Class has been deleted successfully!');
        return redirect('/class');
    }
    public function search(Request $request)
    {
        $get_class = $request->search_name;
        $classes = Classes::where('name', 'LIKE', '%' . $get_class . '%')->get();
        return view('/class/search', compact('classes'));
    }
}
