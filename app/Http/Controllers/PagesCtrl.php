<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;

use iloilofinest\Models\RequestDocu;
use Config;

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
        // $ReqPending = RequestDocu::where('xstatus','=','0')->count();
        // $ReqClosed = RequestDocu::where('xstatus','=','1')->count();
        //,compact('ReqPending','ReqClosed')
        
        return view('pages.home');
    }
 

    public function settings()
    {
        return view('pages.settings');
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

        $OA = Config::get('constants.academic.oa');
        $BA = Config::get('constants.academic.ba');
        $CS =  Config::get('constants.academic.cs');
        $IT =  Config::get('constants.academic.it');
        $CE =  Config::get('constants.academic.ce');
        return view('front.academic',compact('OA','BA','CS','IT','CE'));
    }

    public function academic_show($data)
    {

        // dd($data);
        // $title = $data['title'] 
        // $description = $data['description']

        // $data = array(
        //     'title'  => $data['title'],
        //     'description' => $data['description']
        // );

        return view('front.academic_show',compact('data'));
    }
    

    public function contact(){
        return view('front.contact');
    }



}
