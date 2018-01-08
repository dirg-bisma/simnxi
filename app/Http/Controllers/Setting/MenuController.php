<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/21/2017
 * Time: 6:18 PM
 */

namespace App\Http\Controllers\Setting;


use App\Http\Controllers\Controller;
use Route;
use Closure;



class MenuController extends Controller
{
    public function RouteList()
    {
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };

        $routes = collect(Route::getRoutes());

        foreach (config('pretty-routes.hide_matching') as $regex) {
            $routes = $routes->filter(function ($value, $key) use ($regex) {
                return !preg_match($regex, $value->uri());
            });
        }

        return view('pretty-routes::routes', [
            'routes' => $routes,
            'middlewareClosure' => $middlewareClosure,
        ]);
    }
}