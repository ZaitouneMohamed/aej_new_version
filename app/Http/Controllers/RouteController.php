<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index() {
        return view('index');
    }

    public function routes(Request $request) {
        // dd(Driver::all());
        if(view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }
}
