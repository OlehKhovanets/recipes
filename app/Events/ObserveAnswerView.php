<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ObserveAnswerView
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $answerId;
    public function __construct($answerId)
    {
        $this->answerId = $answerId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getAnswerId(): int
    {
        return $this->answerId;
    }
}
