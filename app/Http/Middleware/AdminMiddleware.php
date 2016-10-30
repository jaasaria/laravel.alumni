<?php

namespace iloilofinest\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


// View::composer('*', function ($view) use ($request) {
              
//               View::share('view_name',
//                 'page--' . str_replace('.', '_', $view->getName()));
//               $body_vars = [];
              
//               if ($request->getRequestUri() == '/') {
//                   $body_vars[] = 'frontpage';
//               }
//               View::share('body_vars', $body_vars);
//           });




        // die(print_r(Auth::user()->role));

        if (Auth::user()->role != "admin") {
            return redirect('admin');
        }

        return $next($request);

    }
}
