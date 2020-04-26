<?php

namespace App\Jobs;

use App\Channel;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $order_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order_id, $delay = 300)
    {
        //
        $this->order_id = $order_id;
        $this->delay($delay);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $order = Order::find($this->order_id);
        if($order->status != 1){
            $order->status = 2;
            $order->save();

            $channel = Channel::find($order->channel_id);
            $channel->status = 1;
            $channel->save();
        }
    }
}
