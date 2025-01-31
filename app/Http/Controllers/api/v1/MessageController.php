<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'message' => $data['message'],
            'link' => Str::uuid()->toString(),
        ]);


        return response()->json([
            'link' => $message->link,
        ]);
    }

    public function show(Message $message)
    {
        return response()->json($message);
    }
}
