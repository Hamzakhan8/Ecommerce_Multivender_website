<?php

namespace App\Http\Middleware;

use Closure;

class ArticleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    /*
    sab se pehley yayah pe liko gey $request matlab requet me jo process a raha hain
    
    if(! $request->user()->anyFunction()){
        return karo ya jo operation karna chahtey ho

        ye jo value waha se aye g us ko ulta karey g aur nechey wala operation perform karey g 
    }

    anyfunction matlab apne marzi ka option banawo jaha se ap kuch return karna chahtey ho boolean etc

    is ko user model me he define karo g q k user()->then function hain is liye ye user model me ho ga
    */
    public function handle($request, Closure $next)
    {
        if (! $request->user()->isNotAdmin()) {
            return redirect()->route('middlewareTesting');

        }
        return $next($request);
    }

// is ko kernal me register b karna 


}
