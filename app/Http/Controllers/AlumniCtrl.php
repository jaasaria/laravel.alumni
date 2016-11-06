<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Models\Users;
use iloilofinest\Models\Message;
use iloilofinest\Models\RequestDocu;

use Auth;
use DB;

use iloilofinest\Http\Requests;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class AlumniCtrl extends Controller
{

    public function index()
    {

        return view('alumni.list');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:200', 
            'documents'=>'required', 
            'description'=>'required', 
        ]);


        $cat = $request->documents; 
        $cat2= implode(",",$cat);

        $note = new RequestDocu();

        $note->title =  $request->title;
        $note->documents = $cat2;
        $note->description = $request->description;
        
        $note->user_id = Auth::user()->id;
        $note->save();

        return redirect('request')->with('success',' Record was successfully saved.');
    }

    public function message(Request $request)
    {
        $this->validate($request,[
            'message'=>'required',
        ]);

        $note = new Message();
        $note->user_id = $request->user_id;
        $note->request_id = $request->request_id;
        $note->description = $request->message;
        $note->save();
        return redirect()->back()->with('success',' Message was successfully sent.');
    }


    public function show($id)
    {
        $data = RequestDocu::findorfail($id);
        return view('front.request_show',compact('data'));
    }

    public function edit($id)
    {
        $data = RequestDocu::findorfail($id);
        $messages = $data->message()->orderby('created_at','desc')->paginate(5);

        return view('alumni.create',compact('data','messages'));
    }
    
    public function update(Request $request, $id)
    {

        $chk = $request->chkStatus;
        $chkval = ($chk ==1? 1:0); 
   

        $note = RequestDocu::findorfail($id);
        $note->xstatus = $chkval;
        $note->save();

        return redirect('alumni')->with('success',' Record was successfully updated.');

    }

    //delete record using standard laravel proc
    public function destroy($id)
    {
        $data = RequestDocu::findorfail($id);
        $data->delete();
        return redirect('request')->with('success','Record was successfully deleted.');
    }


    //delete record using ajax
    public function delete(Request $request)
    {
        $id  = $request->get('id');
        $note = RequestDocu::findorfail($id);
        $note->delete();
    }

    public function getdata(){

        $data = RequestDocu::all()->sortbydesc('id');

        return Datatables::of($data)

            ->addColumn('action', function ($data) {

                return '<div class="text-center">
                            <div class="btn-group">
                                <a href="'. route('alumni.edit',$data->id) .'" type="btn" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>

                                <button id="btndelete" class="btn btn-danger" data-docid='. $data->id .'  data-href="'. route('alumni.delete', $data->id ) .'" ><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                        ';
            })


       ->editColumn('fullname', function ($data) {
                return ucwords($data->user->fullname) ;
            })

        ->editColumn('title', ' 
                         <div class="td-title"><small></small> {{ $title }} </div>
                        ')

        ->editColumn('description', ' 
                          <div class="td-description"> {!! $description !!} </div>
                        ')

       ->editColumn('xstatus', function ($data) {
                return $data->xstatus == 0 ? 
                '<div class="text-center"><span class="label bg-red text-center"><i class="fa fa-clock-o"></i> Pending</span></div>' 
                : 
                '<div class="text-center"><span class="label bg-green"> <i class="fa fa-check-circle-o"></i> Closed</span></div>';
            })

        ->editColumn('created_at',function ($data){
                        return  '<div class="text-center">' . $data->created_at->diffForHumans() . '</div>';
                        })

        ->setRowId('id')
            ->setRowClass(function ($data) {
                 return $data->xstatus == 0 ? 'warning' : 'success';
            })
            ->setRowData([                  //same with = data-id={{ $Notes->id }} note: not sure but i think
                'id' => 'test',
            ])
            ->setRowAttr([
                'color' => 'red',
            ])
            ->make(true);
    }

    
}
