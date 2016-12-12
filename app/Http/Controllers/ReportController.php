<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JasperPHP\Facades\JasperPHP;

class ReportController extends Controller
{
    public function reportAtleta($id, Request $request){
        $jasper = new \JasperPHP\JasperPHP();
    }
}
