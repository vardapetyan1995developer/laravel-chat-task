<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Message as MessageModel;

class ChatController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view ('index');
    }

    /**
     * @param Request $request
     * @return bool[]
     */
    public function send(Request $request): array
    {
        event (
            new Message(
                $request->input ('username'),
                $request->input ('message')
            ));

        MessageModel::query ()->create ([
            'user_id' => auth ()->id (),
            'message' => $request->input ('message')
        ]);

        return ['success' => true];
    }
}
