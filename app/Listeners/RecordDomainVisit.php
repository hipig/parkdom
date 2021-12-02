<?php

namespace App\Listeners;

use App\Events\DomainVisited;

class RecordDomainVisit
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
     * @param  DomainVisited  $event
     * @return void
     */
    public function handle(DomainVisited $event)
    {
        $domain = $event->getDomain();
        $host = $event->getHost();
        $ip = $event->getIp();

        $domain->createVisit($host, $ip);
    }
}
