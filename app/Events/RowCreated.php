<?php

namespace App\Events;

use App\Models\Row;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RowCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $row;

    public function __construct(Row $row)
    {
        $this->row = $row;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('rows'),
        ];
    }
}
