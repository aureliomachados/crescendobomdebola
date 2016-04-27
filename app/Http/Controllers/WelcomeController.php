<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Kim\Activity\Activity;

class WelcomeController extends Controller
{
    public function index(){

        //retorna os usuários ativos na última hora
        $activities = Activity::users(60)->get();

        return view('welcome')->with('activities', $activities);
    }
}
