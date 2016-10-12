<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Http\Requests;

use iloilofinest\Models\Profile; 
use iloilofinest\Models\UserLog; 
use iloilofinest\Models\Users; 
use Auth;
use Session;
use Hash;
use Redirect;

 // use Intervention\Image\Image;
use Image;
use File;
use Validator;
use dbfunction;
use Illuminate\Support\MessageBag;
use Yajra\Datatables\Datatables;

class ProfileCtrl extends Controller
{
   
    // private $userid = Auth::user()->id;
    // String $UserID;

 
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {

        // $timezone = Config::get('test');


        $id =  Auth::user()->id;
        $profile = Profile::find($id);
        return view('profile.profile')->with('profile',$profile); 
    }

    public function messages()
    {
        return [
            'avatar.max' => 'maxx invalild',
        ];
    }

    public function storeemail(Request $request){

            $validator = Validator::make($request->all(), [
            'email'=>'required|email|unique:users',
            ]);

            $messagebag = new MessageBag;

            if (Auth::user()->email == $request->email){

                $messagebag->add('email', 'Please change your email address first.');
                return Redirect::back()
                     ->withInput()
                     ->withErrors($messagebag)
                     ->with('tab','second');
            }


            if ($validator->fails()) {
                return Redirect::back()
                         ->withErrors($validator)
                         ->withInput()
                         ->with('tab','second');
            }




            if (Hash::check($request->password, Auth::user()->password)){
                $user  =  Users::find(Auth::user()->id);
                $user->email = $request->email;
                $user->save();

                dbfunction::insertlogs(Auth::user()->id,'Change Email');

                return redirect(route('profile.index'))
                ->with('success', "Profile email account was successfully updated.")
                ->withInput()
                ->with('tab', "second");
            }
            else{

                $messagebag->add('password', "Entered password doesn't match with current password.");
                return redirect(route('profile.index'))
                ->with('error', "Entered password doesn't match with current password.")
                ->withInput()
                ->withErrors($messagebag)
                ->with('tab', "second")
                ;
            }

    }


    public function storepassword(Request $request){


             $validator = Validator::make($request->all(), [
            'current' => 'required|min:6',
            'newpassword'=>'required|min:6',
            'confipassword'=>'required|min:6|same:newpassword',
            ]);          

            if ($validator->fails()) {
                return Redirect::back()
                         ->withErrors($validator)
                         ->withInput()
                         ->with('tab','second');
            }




            if (Hash::check($request->current, Auth::user()->password)){
                $user  =  Users::find(Auth::user()->id);
                $user->password = Hash::make($request->newpassword);
                $user->save();

                dbfunction::insertlogs(Auth::user()->id,'Change Password');

                return redirect(route('profile.index'))
                ->with('success', "Profile password account was successfully updated.")
                ->with('tab','second');
            }
            else{

                return Redirect::back()
                        ->with('error', "Current password didn't match.")
                        ->with('tab','second');

                // return redirect(route('profile.index'))->with('warning', "User current password didn't match.");
            } 
    
    }






    public function storeprofile(Request $request){

        $this->validate($request,[
            'fullname'=>'required|max:50',
            'address'=>'required|max:100',
            'designation'=>'required|max:50',
            'mobile'=>'required|max:50',
            'Citizenship'=>'required|max:50',
            'notes'=>'required|max:255'
            ]);


            $user  =  Users::find(Auth::user()->id);
          
            $user->name  =  $request->fullname;
            $user->address  =  $request->address;
            $user->designation  =  $request->designation;
            $user->mobile  =  $request->mobile;
            $user->citizenship  =  $request->Citizenship;
            $user->note  =  $request->notes;            
            $user->save();

            dbfunction::insertlogs(Auth::user()->id,'Update Profile');

            return redirect(route('profile.index'))->with('success', "Profile information was successfully updated.");
    
    }




    public function storeimage(Request $request){

        // $this->validate($request,[
        //     'avatar'=>'mimes:jpeg,jpg,png,gif|max:3000|required'
        // ]);

        // dd($request->avatar);

        $file = array('avatar' => $request->avatar);
        $rules = array('avatar'=>'mimes:jpeg,jpg,png|max:3000|required',); 

        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            return redirect(route('profile.index'))
                    ->withErrors($validator)
                    ->with('error', "Upload File is not valid");
        }

        // dd($request->file('avatar')->isValid());

        // if ($request->hasFile('avatar')){
        if ($request->file('avatar')->isValid()) {

            $user  =  Users::find(Auth::user()->id);

            $avatar = $request->file('avatar');
            $filename = Auth::user()->id . '-' .  time() . '.' . $avatar->getClientOriginalExtension();
            $path = public_path('upload/avatars/' . $filename);

            //deleting image if not default
            if ($user->avatar !== 'default.png') {
                $tempfile = 'upload/avatars/' . $user->avatar;
                if (File::exists($tempfile)) {
                    unlink($tempfile);
                }
            }

            Image::make($avatar)->resize(160,160)->save($path);           
            $user->avatar  =  $filename;
            $user->save();

            dbfunction::insertlogs(Auth::user()->id,'Update Profile Picture');

            return redirect(route('profile.index'))
                ->with('success', "Profile avatar was successfully updated.");
        }
        else{
            return Redirect::back()
                ->with('error', "Upload File is not valid");
        }

    }




    public function DeleteImage(){

        $user  =  Users::find(Auth::user()->id);        

        if ($user->avatar != 'default.png'){
            $tempfile = 'upload/avatars/' . $user->avatar;
            if (File::exists($tempfile)) {
                unlink($tempfile);
            }
            $user->avatar = 'default.png';
            $user->save();
            
            // return redirect(route('profile.index'));
        }

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

       

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }






    public function get_all_logs()
    {


    $table = Users::find(Auth::user()->id)->userlog;

    return Datatables::of($table)
    ->editColumn('created_at', ' 
                    <div class="td-note">{{ $created_at }} </div>
                    ')
    ->editColumn('task', ' 
                      <div class="td-note">{{ $task }} </div>
                    ')
    ->setRowId('id')
        ->setRowClass(function ($table) {
             return 'info';
        })
       
        ->make(true);
    }





}
