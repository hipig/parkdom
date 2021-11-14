<?php

namespace App\Events;

use App\Models\Model;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DomainVisited
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $domain;

    protected $host;

    protected $ip;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($domain, $host, $ip)
    {
        $this->domain = $domain;
        $this->host = $host;
        $this->ip = $ip;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
