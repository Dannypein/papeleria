<?php namespace papeleria\Http\Middleware;

use Closure;

class RejectNormalUsers extends Authenticate {

  public function handle($request, Closure $next) {

    if ($this->auth->check() && $this->auth->user()->Normal()) {
      return redirect()->route('home');

    } else {

      return $next($request);
      
    }
  }

}
