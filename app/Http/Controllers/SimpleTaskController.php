<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleTaskController extends Controller
{
    public function index($input)
    {
        //Return true if input is bigger than 10;
        return $input > 10 ? true : false;
    }

    public function view()
    {
        $pagename = "Sum two number";

        return view('sum', compact('pagename'));
    }

    public function sum(Request $request)
    {
        return $request->a + $request->b;
    }
}
