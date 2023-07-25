<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.service.list-services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create-service');
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

        $service = new Service();

        if($request['title'] != null ){
            $service->title = $request['title'];
        }

        if($request['description'] != null ){
            $service->description = $request['description'];
        }

        if($request['image'] != null ){
            $request = $request->file('image');
            $input['image'] = time(). '.'. $request->getClientOriginalName();
            $destinationPath = public_path('/images');
            $service->image = $input['image'];

            $request->move( $destinationPath, $input['image'] );
        }

        $service->user_id = Auth::user()->id;

        $service->save();

        $message = "Service ajoute avec succes";

        return redirect()->back()->with('message', $message);

        //return view('admin.service.list-services', compact('services'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Service $service)
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.service.update-service', compact('service'));
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

        $service = Service::findOrFail($id);

        if($request['title'] != null ){
            $service->title = $request['title'];
        }

        if($request['description'] != null ){
            $service->description = $request['description'];
        }

        if($request['image'] != null ){
            $request = $request->file('image');
            $input['image'] = time(). '.'. $request->getClientOriginalName();
            $destinationPath = public_path('/images');
            $service->image = $input['image'];

            $request->move( $destinationPath, $input['image'] );
        }

        $service->user_id = Auth::user()->id;

        $service->update();

        $services = Service::all();

        return view('admin.service.list-services', compact('services'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

    public function delete($id){

        $service = Service::find($id);
        $service->delete();

        $message = "Vous avez supprimé un service avec succes";

        return redirect()->back()->with('message', $message);
    }
}
