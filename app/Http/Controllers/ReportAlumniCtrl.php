<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;
use iloilofinest\Models\Users;
use iloilofinest\Models\Profile;
use iloilofinest\Models\Activity;

use Auth;
use DB;

use iloilofinest\Http\Requests;
use Yajra\Datatables\Datatables;
// use Carbon\Carbon;

class ReportAlumniCtrl extends Controller
{

    public function index()
    {
        return view('report.alumni.list');
    }
    public function create()
    {
        
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }

    public function edit($id)
    {
        $data = Users::Alumni()->findorfail($id);
        return view('report.alumni.create',compact('data'));
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'firstname'=>'required|max:50',
            'middlename'=>'required|max:50',
            'lastname'=>'required|max:50',

            'address'=>'required|max:100',
            'mobile'=>'required|max:50',
            'Citizenship'=>'required|max:50',

            'yeargraduated'=>'required|date',
            'notes'=>'max:255'
            ]);

            $chk = $request->chkStatus;
            $chkval = ($chk ==1? 1:0); 

            $user  =  Users::find($id);
            $user->name  =  $request->firstname;
            $user->middlename  =  $request->middlename;
            $user->lastname  =  $request->lastname;
            $user->address  =  $request->address;
            $user->mobile  =  $request->mobile;
            $user->citizenship  =  $request->Citizenship;
            $user->designation  =  $request->designation;
            $user->note  =  $request->notes;        
            $user->campus  =  $request->campus;        
            $user->program  =  $request->program;
            $date=date_create($request->yeargraduated);
            $user->yeargraduated  = date_format($date,"Y-m-d");
            $user->companyname  =  $request->companyname;        
            $user->companyadd  =  $request->companyadd;      
            $user->xstatus = $chkval;  
            $user->save();

        return redirect('report/alumni')->with('success',' Record was successfully saved.');

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
        $note = users::find($id);
        $note->delete();
    }

    public function getdata(){


        // $data = Users::where('role','alumni')->get();
        $data = Users::Alumni()->get();


        return Datatables::of($data)
        ->addColumn('action', function ($data) {

                return '<div class="text-center">
                            <div class="btn-group-vertical">
                                <a href="'. route('report.alumni.edit',$data->id) .'" type="btn" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>
                            </div>
                        </div>
                        ';
            })

          // <button id="btndelete" class="btn btn-danger" data-docid='. $data->id .'  data-href="'. route('report.alumni.delete', $data->id ) .'" ><i class="fa fa-trash-o"></i></button>

        ->editColumn('lastname', ' {{ ucwords($lastname) }},' . '  {{ ucwords($name) }}  {{ ucwords($middlename) }} ')

        ->editColumn('address', ' 
                      <div class="td-description"> <small>{!! $address !!}</small><br> 
                      <small>Mobile:{!! $mobile !!}</small>  </div>
                    ')

        ->editColumn('program', '
                    {{ $program }} <br>
                    <small>Year Graduated: {{ $yeargraduated }}</small>
                    ')

        ->editColumn('companyname', '
                    {{ $companyname }} <br>
                    <small>Company Name: {{ $companyname }}</small><br>
                    <small>Address: {{ $companyadd }}</small><br>
                    <small>Job Title: {{ $designation }}</small><br>
                    ')

        ->editColumn('email', '{{ $email }}')

        ->editColumn('xstatus', function ($data) {
                return $data->xstatus == 0 ? 
                '<div class="text-center"><span class="label bg-red text-center"><i class="fa fa-clock-o"></i> Not Verify</span></div>' 
                : 
                '<div class="text-center"><span class="label bg-green"> <i class="fa fa-check-circle-o"></i> Verified</span></div>';
            })

        ->editColumn('created_at',function ($data){
                        return  '<div class="text-center">' . $data->created_at->diffForHumans() . '</div>';
                        })

        ->setRowId('id')
            // ->setRowClass(function ($data) {
            //      return $data->xstatus == 0 ? 'warning' : 'success';
            // })
            ->setRowData([                  //same with = data-id={{ $Notes->id }} note: not sure but i think
                'id' => 'test',
            ])
            ->setRowAttr([
                'color' => 'red',
            ])
            ->make(true);
    }


}
