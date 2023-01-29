<?php

namespace Mrpath\RestApi\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mrpath\Core\Repositories\LocaleRepository;

class LocaleMiddleware
{
    /**
     * Locale repository.
     *
     * @var \Mrpath\Core\Repositories\LocaleRepository
     */
    protected $localeRepository;

    /**
     * Create a middleware instance.
     *
     * @param  \Mrpath\Core\Repositories\LocaleRepository  $localeRepository
     * @return void
     */
    public function __construct(LocaleRepository $localeRepository)
    {
        $this->localeRepository = $localeRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $localeCode = $request->header('x-locale');

        if ($localeCode && $this->localeRepository->findOneByField('code', $localeCode)) {
            app()->setLocale($localeCode);

            return $next($request);
        }

        app()->setLocale(core()->getDefaultChannel()->default_locale->code);

        return $next($request);
    }
}
