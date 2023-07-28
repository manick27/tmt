<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all()->reverse();
        $services = Service::all();

        return view('admin.blog.list-blogs', compact('blogs', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();

        if($services->count()){
            return view('admin.blog.create-blog', compact('services'));
        }
        else {
            $error = "Vous devez créer au-moins un service";
            return view('admin.service.create-service')->with($error, 'error');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5|max:100',
            "description" => 'required|string|min:10|max:1000',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $blog = new blog();

        if($request['title'] != null ){
            $blog->title = $request['title'];
        }

        if($request['description'] != null ){
            $blog->description = $request['description'];
        }

        if($request['service_id'] != null ){
            $blog->service_id = $request['service_id'];
        }

        if($request['image'] != null ){
            $request = $request->file('image');
            $input['image'] = time(). '.'. $request->getClientOriginalName();
            $destinationPath = public_path('/images');
            $blog->image = $input['image'];

            $request->move( $destinationPath, $input['image'] );
        }

        $blog->user_id = Auth::user()->id;

        // dd($blog);
        $blog->save();

        $message = "Blog publié avec succes";

        return redirect()->back()->with('message', $message);

        // return view('admin.blog.list-blogs', compact('blogs', 'services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(blog $blog)
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $services = Service::all();

        return view('admin.blog.update-blog', compact('blog', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:5|max:100',
            "description" => 'required|string|min:10|max:1000',
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $blog = Blog::findOrFail($id);

        if($request['title'] != null ){
            $blog->title = $request['title'];
        }

        if($request['description'] != null ){
            $blog->description = $request['description'];
        }

        if($request['service_id'] != null ){
            $blog->service_id = $request['service_id'];
        }

        if($request['image'] != null ){
            $request = $request->file('image');
            $input['image'] = time(). '.'. $request->getClientOriginalName();
            $destinationPath = public_path('/images');
            $blog->image = $input['image'];

            $request->move( $destinationPath, $input['image'] );
        }

        $blog->user_id = Auth::user()->id;

        $blog->update();

        $message = "Blog modifié avec succes";

        return redirect()->back()->with('message', $message);

        // return view('admin.blog.list-blogs', compact('blogs', 'services'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
    }

    public function delete($id){

        $blog = Blog::findOrFail($id);
        
        $blog->delete();

        $message = "Vous avez supprimé un blog avec succes";

        return redirect()->back()->with('message', $message);
    }

    public function blogsForService($id){

        $blogs = Blog::where('service_id', $id)->get()->reverse();

        $services = Service::all();

        return view('blog.blog', compact('blogs', 'services'));
    }

    public function blogDetails($id){

        $blog = Blog::findOrFail($id);

        $blogs = Blog::where('service_id', $blog->id)->get()->reverse();

        $comments = Comment::where('blog_id', $blog->id)->get();

        $services = Service::all();

        return view('blog.blog-details', compact('blogs', 'blog', 'services', 'comments'));
    }
}
