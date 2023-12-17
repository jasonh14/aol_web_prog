<?php

namespace App\Jobs;

// app/Jobs/SendChatResponse.php

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendChatResponse implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $url;
    protected $payload;

    public function __construct($url, $payload)
    {
        $this->url = $url;
        $this->payload = $payload;
    }

    public function handle()
    {
        Http::post($this->url, $this->payload);
    }
}
