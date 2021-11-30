<?php

namespace App\Http\Middleware;

use App\Events\DomainCreated;
use App\Models\Domain;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BindDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $domainName = parseHost($request->getHost(), 'domain');

        try {
            $domain = Domain::query()->where('domain', $domainName)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $domain = Domain::create(['domain' => $domainName]);

            event(new DomainCreated($domain));
        }
        $request->route()->setParameter('bindDomain', $domain);

        $this->setTheme($domain);

        return $next($request);
    }

    protected function setTheme($domain)
    {
        $defaultTheme = $domain->template ?? config('theme.active', 'default');
        \Theme::set($defaultTheme);
    }
}
