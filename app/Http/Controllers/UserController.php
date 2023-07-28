<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\Service;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
            ],
            'phone' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $user = User::findOrFail(Auth::user()->id);

        if($request['first_name'] != null ){
            $user->first_name = $request['first_name'];
        }

        if($request['last_name'] != null ){
            $user->last_name = $request['last_name'];
        }

        if($request['email'] != null ){
            $user->email = $request['email'];
        }

        if($request['phone'] != null ){
            $user->phone = $request['phone'];
        }

        if($request['country'] != null ){
            $user->country = $request['country'];
        }

        if($request['image'] != null){
            $request = $request->file('image');
            $input['image'] = time(). '.'. $request->getClientOriginalName();
            $destinationPath = public_path('/images');
            $user->image = $input['image'];

            $request->move( $destinationPath, $input['image'] );
        }

        $user->save();

        $user = User::findOrFail(Auth::user()->id);

        $message = "Profil modifié avec succes";

        return redirect()->back()->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function home()
    {
        $services = Service::all();
        $newsletters = Newsletter::all();
        $users = User::all();
        $blogs = Blog::all();

        return view('admin.home', compact('services', 'newsletters', 'users', 'blogs'));
    }

    public function admin(string $id)
    {
        $user = User::findOrFail($id);

        $user->is_admin = 1;

        $user->save();

        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function notAdmin(string $id)
    {
        $user = User::findOrFail($id);

        $user->is_admin = 0;

        $user->save();

        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function myProfile()
    {
        $user = User::findOrFail(Auth::user()->id);

        $blogs = Blog::where('user_id', Auth::user()->id)->get();

        $services = Service::where('user_id', Auth::user()->id)->get();

        $comments = new Collection();
        foreach($blogs as $blog){
            $comment = Comment::where('blog_id', $blog->id)->get();
            $comments->push($comment);
        }

        $nberComment = $comments->count();

        $edit = false;

        return view('admin.profile', compact('user', 'blogs', 'services', 'edit', 'nberComment'));
    }

    public function editMyProfile()
    {
        $user = User::findOrFail(Auth::user()->id);

        $blogs = Blog::where('user_id', Auth::user()->id)->get();

        $services = Service::where('user_id', Auth::user()->id)->get();

        $comments = new Collection();
        foreach($blogs as $blog){
            $comment = Comment::where('blog_id', $blog->id)->get();
            $comments->push($comment);
        }

        $nberComment = $comments->count();

        $edit = true;

        return view('admin.profile', compact('user', 'blogs', 'services', 'edit', 'nberComment'));
    }
}
