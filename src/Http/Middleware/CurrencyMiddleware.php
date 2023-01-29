<?php

namespace Mrpath\RestApi\Http\Middleware;

use Closure;
use Mrpath\Core\Repositories\CurrencyRepository;

class CurrencyMiddleware
{
    /**
     * Currency repository.
     *
     * @var \Mrpath\Core\Repositories\CurrencyRepository
     */
    protected $currencyRepository;

    /**
     * Create a middleware instance.
     *
     * @param  \Mrpath\Core\Repositories\CurrencyRepository $locale
     * @return void
     */
    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currencyCode = $request->header('x-currency');

        if ($currencyCode && $this->currencyRepository->findOneByField('code', $currencyCode)) {
            core()->setCurrency($currencyCode);

            return $next($request);
        }

        core()->setCurrency(core()->getChannelBaseCurrencyCode());

        return $next($request);
    }
}
