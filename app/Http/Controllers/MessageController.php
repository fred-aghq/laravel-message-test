<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages = Message::query();

        if ((int) $request->get('all') !== 1) {
            $messages->whereNull('archived');
        }

        if ((int) $request->get('unread') === 1) {
            $messages->whereNull('read');
        }

        $messages->orderBy('sent', 'DESC');

        return view('messages.index', ['messages' => $messages->get()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'subject' => 'sometimes|max:20',
            'body' => 'required|max:240',
        ]);

        $message = new Message($input);

        $message->sent = Carbon::now();
        $message->save();
        return response($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('messages.show', ['message' => Message::findOrFail($id)]);
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
        $inputData = $request->validate([
            'archive' => ['sometimes', Rule::in([0,1])],
            'read'=> ['sometimes', Rule::in([0,1])],
        ]);

        $message = Message::findOrFail($id);

        if (array_key_exists('archive', $inputData)) {
            $message->archived = (int) $inputData['archive'] === 1 ? Carbon::now() : null;
        }

        if (array_key_exists('read', $inputData)) {
            $message->read = (int) $inputData['read'] === 1 ? Carbon::now() : null;
        }

        $message->save();
        return redirect('/messages');
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
