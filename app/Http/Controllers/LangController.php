<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function home($lang){
        $langs=['bn','en'];
        if (in_array($lang, $langs)) {
            Session::set('lang', $lang);
            return Redirect::back()->with('lang_msg','Your Changeing language')->with('lang',$lang);
        }
    }
}
