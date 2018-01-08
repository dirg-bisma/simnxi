<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 12/15/2017
 * Time: 10:24 PM
 */

namespace App\Http\Middleware;

use Closure;
use App\Model\Users;
use Illuminate\Http\Request;

class AuthToken
{

    public function handle(Request $request, Closure $next)
    {
        $route_login = $request->getPathInfo();

        if($request->is('api/*')){
            if($route_login == '/api/auth/apilogin' || $route_login == '/api/auth/register' ){
                return $next($request);
            }else{
                $user = new Users();
                $data = $user->where('api_token', $request->input('api_token'))
                    ->where('username', $request->input('username'))->count();
                if($data > 0){
                    return $next($request);
                }else{
                    $data = array(
                        'msg' => 'forbiden access.',
                        'status' => 'false',
                        'error' => '403'
                    );
                    return response($data, '403');//->view('errors.403',403);
                }
                //return response($route_login,200);
            }
        }else{
            return $next($request);
        }

    }
}