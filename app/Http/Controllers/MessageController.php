<?php

namespace App\Http\Controllers;

use App\Mail\MailService;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all()->reverse();

        return view('admin.message', compact('messages'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            "subject" => 'string|max:1000',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());
        }

        $message = new Message();

        if($request['name'] != null ){
            $message->name = $request['name'];
        }

        if($request['email'] != null ){
            $message->email = $request['email'];
        }

        if($request['subject'] != null ){
            $message->subject = $request['subject'];
        }

        if($request['message'] != null ){
            $message->message = $request['message'];
        }

        $message->message_uid = uniqid();

        $message->save();

        $details = [
            'title' => $request['subject'],
            'body' => $request['message'],
            'destination' => 'aymartchimwa@gmail.com',
            'copy' => 'manicknguewouo@gmail.com'
        ];

        Mail::queue(new MailService($details));

        $message = "message envoyé avec succès";

        return redirect()->back()->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
