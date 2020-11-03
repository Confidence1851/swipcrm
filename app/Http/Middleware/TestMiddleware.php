<?php

namespace App\Http\Middleware;

use Closure;
use App\Active;
use Carbon\Carbon;
use App\User;

class TestMiddleware
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
        $today = new Carbon;
        $admin= User::where('role' ,'admin')->count();
        $count = Active::count();

        if($count < 1){
            $new = Active::create([
                'status' => 0 ,
                'date' => $today,
            ]);
        }

        if($admin < 1){
            $user = User::create([
                'name' => 'Admin',
                'username' => 'AdminSwip' ,
                'password' => bcrypt('password') ,
                'role' => 'admin',
            ]);
        }

        $active = Active::first();
        if($active->status == 0){
            return redirect()->route('welcome');
        }
        else{
            return $next($request);
        }
    }
}
