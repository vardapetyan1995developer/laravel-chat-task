<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Message implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $username;
    public string $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $username, string $message)
    {
        $this->username = $username;
        $this->message = $message;
    }

    /**
     * @return Channel
     */
    public function broadcastOn(): Channel
    {
        return new Channel('chat');
    }

    /**
     * @return string
     */
    public function broadcastAs(): string
    {
        return 'message';
    }
}
