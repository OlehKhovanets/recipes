<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ObserveArticleView
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private int $articleId;
    public function __construct($articleId)
    {
        $this->articleId = $articleId;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }
}
