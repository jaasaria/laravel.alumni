<?php

namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;

use iloilofinest\Models\Users;
use iloilofinest\Models\Note;

use Auth;


use iloilofinest\Http\Requests;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class NoteCtrl extends Controller
{


    public function index()
    {
        return view('notes.listnotes');
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:6|max:255', 
            'note'=>'required', 
        ]);

        $note = new Note();

        $chk = $request->chkStatus;
        $chkval = ($chk ==1? 1:0); 
        $note->title = $request->title;
        $note->note = $request->note;
        $note->xstatus = $chkval;
        $note->user_id = Auth::user()->id;
        $note->save();

        return redirect(route('note_list'))->with('success',' Record was successfully saved.');

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $note = note::find($id);
        return view('notes.create')->with('Notes',$note);
    }
    

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:6', 
            'note'=>'required', 
        ]);

        $note = note::find($id);

        $chk = $request->chkStatus;
        $chkval = ($chk ==1? 1:0); 

        $note->title = $request->title;
        $note->note = $request->note;
        $note->xstatus = $chkval;
        $note->save();

        return redirect(route('note_list'))->with('success',' Record was successfully updated.');

    }

    public function destroy($id)
    {
        $note = note::find($id);
        $note->delete();
        return redirect(route('note_list'))->with('success','Record was successfully deleted.');
    }
    public function delete(Request $request)
    {
        //session()->set('success','Item created successfully.');
        $id  = $request->get('id');
        $note = note::find($id);
        $note->delete();

        
    }

    public function get_all_data()
    {

        $notes = Users::find(Auth::user()->id)->notes;

        return Datatables::of($notes)

            ->addColumn('action', function ($note) {

                return '<div class="text-center">
                            <div class="btn-group">
                                <a href="'. route('note_edit',$note->id) .'" type="btn" class="btn btn-warning"><i class="fa fa-pencil-square"></i></a>

                                <button id="btndelete" class="btn btn-danger" data-docid='. $note->id .'  data-href="'. route('note_destroy', $note->id ) .'" ><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                        ';
            })

        ->editColumn('title', ' 
                         <div class="td-title"><small></small> {{ $title }} </div>
                        ')

        ->editColumn('note', ' 
                          <div class="td-note1">{{ $note }} </div>
                        ')

       ->editColumn('xstatus', function ($note) {
                return $note->xstatus == 0 ? 
                '<div class="text-center"><span class="label bg-blue text-center"><i class="fa fa-clock-o"></i> Pending</span></div>' 
                : 
                '<div class="text-center"><span class="label bg-green"> <i class="fa fa-check-circle-o"></i> Complete</span></div>';
            })

        ->editColumn('created_at',function ($note){
                        return  '<div class="text-center">' . $note->created_at->diffForHumans() . '</div>';
                        })

        ->setRowId('id')
            ->setRowClass(function ($note) {
                 return $note->xstatus == 0 ? 'warning' : 'info';
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
