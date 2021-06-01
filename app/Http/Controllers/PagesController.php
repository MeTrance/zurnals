<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{
    public function admin(){
        if(Gate::denies('view-admin')){
            return redirect(route('home'));
        }

        return view('admin');
    }
}
