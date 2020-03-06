<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class PostsController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name', 'categories.slug')
            ->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        return view('posts.newpost', compact('category'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:125|min:4',
            'image' => 'required|mimes:jpeg,jpg,png|max:1000',
            'details' => 'required',
        ];
        $this->validate($request, $rules);

        $data = array();
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['category_id'] = $request->category_id;
        $image = $request->file('image');
        if ($image) {
            $imageName = hexdec(uniqid());
            $extension = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName. '.' .$extension;
            $uploadPath = 'public/frontend/postsimg/';
            $imageURL = $uploadPath . $imageFullName;
            $success = $image->move($uploadPath, $imageFullName);
            $data['image'] = $imageURL;
            DB::table('posts')->insert($data);
            Session()->flash('success', 'Post created successfully.');
            return redirect('/posts');

        } else {
            DB::table('posts')->insert($data);
            Session()->flash('success', 'Post created successfully.');
            return redirect('/posts');
        }
        
    }

    public function show($id)
    {
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name', 'categories.slug')
            ->where('posts.id', $id)
            ->first();
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $categories = DB::table('categories')->get();
        $post = DB::table('posts')->where('id', $id)->first();
        return view('posts.edit', compact('categories', 'post'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:125|min:4',
            'image' => 'mimes:jpeg,jpg,png|max:1000',
            'details' => 'required|max:1000',
        ];
        $this->validate($request, $rules);

        $data = array();
        $data['title'] = $request->title;
        $data['details'] = $request->details;
        $data['category_id'] = $request->category_id;
        $image = $request->file('image');
        if ($image) {
            $imageName = hexdec(uniqid());
            $extension = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName. '.' .$extension;
            $uploadPath = 'public/frontend/postsimg/';
            $imageURL = $uploadPath . $imageFullName;
            $success = $image->move($uploadPath, $imageFullName);
            $data['image'] = $imageURL;

            unlink($request->old_image);

            DB::table('posts')->where('id', $id)->update($data);
            Session()->flash('success', 'Post updated successfully.');
            return redirect('/posts');

        } else {
            $image = $request->file('image');
            DB::table('posts')->where('id', $id)->update($data);
            Session()->flash('success', 'Post updated successfully.');
            return redirect('/posts');
        }
    }

    public function destroy($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();
        $image = $post->image;

        $delete = DB::table('posts')->where('id', $id)->delete();
        if ($delete) {
            unlink($image);
            Session()->flash('success', 'Posts deleted successfully.');
            return redirect('/posts');
        }
    }
}
