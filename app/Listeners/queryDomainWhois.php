<?php

namespace App\Listeners;

use App\Events\DomainCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class QueryDomainWhois
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DomainCreated  $event
     * @return void
     */
    public function handle(DomainCreated $event)
    {
        $domain = $event->getDomain();

    }
}
