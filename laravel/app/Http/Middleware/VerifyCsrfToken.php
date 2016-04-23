<?php namespace freshwax\Http\Middleware;

use Closure;
use Route; 
use Request; 
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if($request->method() == 'POST')
        {
        	return $next($request);
        }

		return parent::handle($request, $next);
	}

}
