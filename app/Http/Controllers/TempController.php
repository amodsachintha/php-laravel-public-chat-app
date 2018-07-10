<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempController extends Controller
{
    public function varDump(Request $request){
        return dump($request->all());
    }
}
