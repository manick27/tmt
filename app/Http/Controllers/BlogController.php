<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
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
            return view('admin.service.create-service');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

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

        $blog->save();

        $blogs = Blog::all();

        return view('admin.blog.list-blogs', compact('blogs'));
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
        $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

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

        $blogs = Blog::all();
        $services = Service::all();

        return view('admin.blog.list-blogs', compact('blogs', 'services'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blog $blog)
    {
        //
    }

    public function delete($id){

        $blog = Blog::find($id);
        $blog->delete();

        $message = "Vous avez supprimé un blog avec succes";

        return redirect()->back()->with('message', $message);
    }
}
