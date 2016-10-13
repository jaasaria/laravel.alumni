<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;

use iloilofinest\Http\Requests;

class PagesCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    // User Auth
    public function login()
    {
        return view('pages.login');
    }    
    public function email()
    {
        return view('pages.email');
    }    
    public function registration()
    {
        return view('pages.registration');
    }    
    public function reset()
    {
        return view('pages.reset');
    }  

    public function admin()
    {
        return view('pages.home');
    }
    public function help()
    {
        return view('pages.help');
    }


    // ----------------------------------------- FRONT END -----------------------------------------

    public function home()
    {
        return view('front.home');
    }
    public function about()
    {
        return view('front.about.about');
    }
    public function vision()
    {
        return view('front.about.visionmission');
    }
    public function hymn()
    {
        return view('front.about.hymn');
    }
    public function academic()
    {
        return view('front.academic');
    }
    public function contact()
    {
        return view('front.contact');
    }



}
