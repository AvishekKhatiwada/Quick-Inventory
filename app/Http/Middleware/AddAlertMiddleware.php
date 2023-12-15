<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use App\Models\Alert;
use Illuminate\Http\Request;

class AddAlertMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $sql = DB::select("SELECT * FROM stocks INNER JOIN products ON stocks.pid = products.id");
        $result = [];
        for ($i = 0; $i < count($sql); $i++) {
            if ($sql[$i]->quantity <= $sql[$i]->warningquantity) {
                $result[$i] = $sql[$i];
            }
        }
        $request->attributes->add(["alertCount" => count($result)]);
        // $alertCount = count($result);
        // return $alertCount;

        return $next($request);
    }
}
