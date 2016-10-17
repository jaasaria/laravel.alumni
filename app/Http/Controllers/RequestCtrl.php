<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Models\Users;
use iloilofinest\Models\RequestDocu;

use Auth;
use DB;

use iloilofinest\Http\Requests;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class RequestCtrl extends Controller
{

    public function index()
    {
        return view('request.list');
    }

    public function create()
    {
        return view('request.create');
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


    public function show($id)
    {
        $data = RequestDocu::find($id);

        // dd($data);
        return view('front.request_show',compact('data'));

    }

    public function edit($id)
    {
        $data = RequestDocu::find($id);
        return view('request.create',compact('data'));
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|max:200', 
            'documents'=>'required', 
            'description'=>'required', 
        ]);


        $cat = $request->documents; 
        $cat2= implode(",",$cat);

        $note = RequestDocu::find($id);

        $note->title = $request->title;
        $note->documents = $cat2;
        $note->description = $request->description;
        $note->save();

        return redirect('request')->with('success',' Record was successfully updated.');

    }

    //delete record using standard laravel proc
    public function destroy($id)
    {
        $data = RequestDocu::find($id);
        $data->delete();
        return redirect('request')->with('success','Record was successfully deleted.');
    }


    //delete record using ajax
    public function delete(Request $request)
    {
        $id  = $request->get('id');
        $note = RequestDocu::find($id);
        $note->delete();
    }

    public function getdata(){

        $data = Users::find(Auth::user()->id)->request;

        return Datatables::of($data)

            ->addColumn('action', function ($data) {

                return '<div class="text-center">
                            <div class="btn-group">
                                <a href="'. route('request.edit',$data->id) .'" type="btn" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>

                                <button id="btndelete" class="btn btn-danger" data-docid='. $data->id .'  data-href="'. route('request.delete', $data->id ) .'" ><i class="fa fa-trash-o"></i></button>
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

    public function list_request(){
        $datas  = RequestDocu::whereIn('xstatus',array(1))->get()->sortbydesc('created_at');
        return view('front.request',compact('datas'));
     
    }

}
