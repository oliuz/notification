<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Message;
use App\Notifications\InvoicePaid;

class MessageController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        //
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_auth = auth()->user()->id;
        
        $users = User::where('id', '!=', $user_auth)->get();

        return view(
            'auth.message',
            [
                'users' => $users
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validator

        $validator = $request->validate(
            [
                "recipient_id"  => "required|exists:users,id",
                "body"          => "required|max:200"
            ]
        );

        // Create Message
        
        $message = Message::create([
            "sender_id"     => auth()->user()->id,
            "recipient_id"  => $request->recipient_id,
            "body"          => $request->body
        ]);

        // Obtener Recipient y notificar

        $recipient = User::find($request->recipient_id);
        $recipient->notify(new InvoicePaid($message));

        // Return

        return back()->with('create', 'Mensaje creado satisfactoriamente.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
