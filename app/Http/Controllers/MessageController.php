<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\Media;
use App\Events\ReadMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageEvent;
use App\Models\ChatMessage;

class MessageController extends Controller

{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function chat()
    {
        $messages = ChatMessage::where('chats.sender_id', Auth::id())
            ->orWhere('chats.receiver_id', Auth::id())
            ->join('users', 'users.id', '=', 'chats.sender_id')
            ->join('users as r_user', 'r_user.id', '=', 'chats.receiver_id', 'LEFT')
            ->select('chats.*', 'users.firstname as s_fname', 'users.lastname as s_lname', 'r_user.firstname as r_fname', 'r_user.lastname as r_lname')
            ->get();
        $result['chats'] = $messages;
        $result['users']  = User::all();

        $result['users'] = User::where('id', '!=', Auth::id())->get();
        return view('chat')->with($result);
    }

    public function search(Request $request)
    {
      $search = $request->input('search');
      $users = User::where('id', '!=', Auth::id())->where('firstname', 'like', "%$search%")->get();
      return response()->json($users);
    }


    public function deleteMessage(Request $request)
    {
        $messageId = $request->input('messageId');

        $deleted = ChatMessage::where('id', $messageId)->delete();
    
        if ($deleted) {
            return response()->json([
                'sts' => true,
                'msg' => 'Message deleted successfully'
            ]);
        } else {
            return response()->json([
                'sts' => false,
                'msg' => 'Failed to delete message'
            ]);
        }
    }
    
    public function sendMessage(Request $request)
    {
        $msg = ChatMessage::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver,
            'message' => $request->message
        ]);

        $imageName = [];
        if($request->hasFile('images')){
            $images = $request->file('images');
            foreach($images as $image){
                $name = time().'_'.$image->getClientOriginalName();
                $type = explode('/', $image->getClientMimeType());  
                $saved = $image->move(public_path('images'), $name);
                $imageName[] = $name;
                Media::create([
                    'chat_id' => $msg->id,
                    'name' => $name,
                    'type' => $type[0]
                ]);
            }
        }

        if(!empty($imageName)){
            ChatMessage::where('id', $msg->id)->update([
                'attachment' => (!is_null($imageName) ? 1 : null)
            ]);
        }

        $message = ChatMessage::where('chats.id', $msg->id)
            ->join('users', 'users.id', '=', 'chats.sender_id')
            ->join('users as r_user', 'r_user.id', '=', 'chats.receiver_id', 'LEFT')
            ->select('chats.*', 'users.firstname as s_fname', 'users.lastname as s_lname', 'r_user.firstname as r_fname', 'r_user.lastname as r_lname')
            ->first();

        broadcast(new MessageEvent($message, $request->receiver));

        if ($message) {
            return response()->json(['sts' => true, 'msg' => 'Message send succesfuly!', 'message' => $message]);
        } else {
            return response()->json(['sts' => false, 'msg' => 'Unable to send message!']);
        }
    }

    public function getUserMessage(Request $request)
    {
        $my_id = Auth::id();
        $user_id = $request->id;
        //$users = User::where('id', '!=', Auth::id())->get();

        $messages = ChatMessage::orderBy('created_at', 'asc')
            ->where(function ($query) use ($user_id, $my_id) {
                $query->where('sender_id', $my_id)->where('receiver_id', $user_id);
            })->orWhere(function ($query) use ($user_id, $my_id) {
                $query->where('sender_id', $user_id)->where('receiver_id', $my_id);
            })
            ->join('users', 'users.id', '=', 'chats.sender_id')
            ->join('users as r_user', 'r_user.id', '=', 'chats.receiver_id', 'LEFT')
            ->with('media')
            ->select('chats.*', 'users.firstname as s_fname', 'users.lastname as s_lname', 'r_user.firstname as r_fname', 'r_user.lastname as r_lname')
            ->get();

        if ($messages) {
            return response()->json(['sts' => true,  'chats' => $messages]);
        } else {
            return response()->json(['sts' => false, 'msg' => '']);
        }
    }

    public function Mediafile(Request $request){
        return Media::where('id', $request->id)->first();
    }


    public function unreadMessage(Request $request){
        $my_id = Auth::id();
        $user_id = $request->sender;

        $messages = ChatMessage::where('receiver_id', $user_id)->where('is_read', '=', 0)->get();
        broadcast(new ReadMessage($messages, $request->sender));
        return response()->json(['sts' => true]);
    }

    public function readMessage(Request $request){
        $read = ChatMessage::where('receiver_id', $request->receiver)
        ->where('is_read', '=', 0)
        ->update(['is_read' => 1]);
        if($read){
            return response()->json(['sts' => true]);
        }else{
            return response()->json(['sts' => false]);
        }
    }
}

