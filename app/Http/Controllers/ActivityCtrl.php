<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Models\Users;
use iloilofinest\Models\Activity;

use Auth;
use DB;

use iloilofinest\Http\Requests;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ActivityCtrl extends Controller
{

    public function index()
    {
        return view('activity.list');
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:6|max:255', 
            'description'=>'required', 
        ]);

        $note = new Activity();

        $chk = $request->chkStatus;
        $chkval = ($chk ==1? 1:0); 
        $note->title = $request->title;
        $note->description = $request->description;
        $note->xstatus = $chkval;
        $note->user_id = Auth::user()->id;
        $note->save();

        // return redirect( url('jobs/list') )->with('success',' Record was successfully saved.');
        return redirect('activity')->with('success',' Record was successfully saved.');

    }


    public function show($id)
    {
        $data = Activity::find($id);

        // dd($data);
        return view('front.activity_show',compact('data'));

    }

    public function edit($id)
    {
        $data = Activity::find($id);
        return view('Activity.create',compact('data'));
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:6', 
            'description'=>'required', 
        ]);

        $note = Activity::find($id);

        $chk = $request->chkStatus;
        $chkval = ($chk ==1? 1:0); 

        $note->title = $request->title;
        $note->description = $request->description;
        $note->xstatus = $chkval;
        $note->save();

        return redirect('activity')->with('success',' Record was successfully updated.');

    }

    //delete record using standard laravel proc
    public function destroy($id)
    {
        $data = Activity::find($id);
        $data->delete();
        return redirect('Activity')->with('success','Record was successfully deleted.');
    }


    //delete record using ajax
    public function delete(Request $request)
    {
        $id  = $request->get('id');
        $note = Activity::find($id);
        $note->delete();
    }

    public function getdata(){

        $data = Users::find(Auth::user()->id)->activity;

        return Datatables::of($data)

            ->addColumn('action', function ($data) {

                return '<div class="text-center">
                            <div class="btn-group">
                                <a href="'. route('activity.edit',$data->id) .'" type="btn" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>

                                <button id="btndelete" class="btn btn-danger" data-docid='. $data->id .'  data-href="'. route('note_destroy', $data->id ) .'" ><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                        ';
            })

        ->editColumn('title', ' 
                         <div class="td-title"><small></small> {{ $title }} </div>
                        ')

        ->editColumn('description', ' 
                          <div class="td-description"> {!! $description !!} </div>
                        ')

       ->editColumn('xstatus', function ($data) {
                return $data->xstatus == 0 ? 
                '<div class="text-center"><span class="label bg-red text-center"><i class="fa fa-clock-o"></i> Unpublish</span></div>' 
                : 
                '<div class="text-center"><span class="label bg-green"> <i class="fa fa-check-circle-o"></i> Publish</span></div>';
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

    public function list_activity(){
        $datas  = Activity::whereIn('xstatus',array(1))->get()->sortbydesc('created_at');
        return view('front.activity',compact('datas'));
     
    }

}
