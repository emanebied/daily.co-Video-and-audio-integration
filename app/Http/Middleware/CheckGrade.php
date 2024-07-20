<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGrade
{
    public function handle(Request $request, Closure $next, $grade)
    {
        $user = Auth::user();
        $userGrade = $user->grade;

        if ($userGrade != $grade) {
            return redirect()->back()->with('error', 'You do not have permission to join this meeting.');
        }

        return $next($request);
    }

}

