<?php

namespace App\Http\Middleware;

use App\Settings\MailSetting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CoverConfigOfMail
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
        $settings = collect(app(MailSetting::class)->toArray());

        config(Arr::dot($settings->only('host', 'port', 'encryption', 'username', 'password'), 'mail.mailers.smtp.'));
        config(Arr::dot($settings->only('name', 'address'), 'mail.from.'));

        return $next($request);
    }
}
