<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.addcategory');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories|max:255|min:4',
            'slug' => 'required',
        ];
        $this->validate($request, $rules);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data); //we get form data
        $category = DB::table('categories')->insert($data);

        if ($category) {
            Session()->flash('success', 'You successfully created a category.');
            return redirect('/category');
        } else {
            Session()->flash('error', 'Something went wrong, please try again later.');
            return redirect()->back();
        }
        
    }

    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('categories.show')->with('cate', $category);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('categories.edit')->with('cate', $category);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255|min:4',
            'slug' => 'required',
        ];
        $this->validate($request, $rules);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data); //we get form data
        $category = DB::table('categories')->where('id', $id)->update($data);

        if ($category) {
            Session()->flash('success', 'Category updated successfully.');
            return redirect('/category');
        } else {
            Session()->flash('error', 'Nothing to update.');
            return redirect('/category');
        }
    }

    public function destroy($id)
    {
        $delete = DB::table('categories')->where('id', $id)->delete();

        if ($delete) {
            Session()->flash('success', 'Category deleted successfully.');
            return redirect()->back();
        }
    }
}