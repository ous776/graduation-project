<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $messages;
    public $user_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($messages, $user_id)
    {
        $this->messages = $messages;
        $this->user_id = $user_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user-message.'.$this->messages->receiver_id);
    }

    public function broadcastWith(){
        return [
            'messages' => $this->messages
        ];
    }
}
