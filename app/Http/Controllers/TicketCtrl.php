<?php
namespace iloilofinest\Http\Controllers;

use Illuminate\Http\Request;

use iloilofinest\Models\TicketReply;
use iloilofinest\Models\Ticket;
use iloilofinest\Models\Users;


use Yajra\Datatables\Datatables;
use DB;
use Auth;
use Carbon;

use Config;


class TicketCtrl extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }


   public function create()
    {
         return view('ticket.create');    
    }
    public function read($id)
    {
        $ticket = ticket::find($id);

        $reply  = $ticket->reply();
        return view('ticket.read',compact('ticket'));      
    }

    public function store(Request $request)
    { 

        $this->validate($request,[
            'category'=>'required|min:6|max:255', 
            'subject'=>'required|min:6|max:255', 
            'description'=>'required|min:6', 
        ]);

        $ticket = new Ticket();
        $ticket->User_id = Auth::user()->id;
        $ticket->category = $request->category; 
        $ticket->Subject = $request->subject;
        $ticket->description = $request->description;
        
        $ticket->save();

        return redirect(route('ticket.index'))->with('success',' Ticket was successfully saved.');
    }

    public function StoreReply(Request $request,$id)
    {   

        $this->validate($request,[
            'description'=>'required|max:255', 
        ]);

        $ticketReply = new TicketReply();

        $UserID = Auth::user()->id;

        $ticketReply->User_id = Auth::user()->id;
        $ticketReply->Ticket_id = $id;
        $ticketReply->description = $request->description;
        $ticketReply->save();

        return redirect(route('ticket.read',$UserID))->with('success','Ticket reply was successfully sent.');
    }


    public function get_all_data()
    {

        $tickets = Users::find(Auth::user()->id)->tickets;
        return Datatables::of($tickets)

        ->addColumn('attachment', function ($ticket) {
                return '<div class="attachment">
                            <i class="fa fa-paperclip"></i>
                        </div>
                        ';
            })

        ->editColumn('category', ' 
                        {{ $category }}
                        ')


         ->editColumn('subject',function ($ticket){
                    return ' <a href="' . route('ticket.read',$ticket->id) .  '">'  . $ticket->subject . '</a>';
                    })

        ->editColumn('description',function ($ticket){
               
                return  $ticket->ifRead == 0 ? 
                ' <div class="Read_False">' .  $ticket->description . '</div>'
                :
                ' <div class="Read_True">' .  $ticket->description . '</div>'
                ;
                })

         ->editColumn('created_at',function ($ticket){
                        return $ticket->created_at->diffForHumans();
                        })

       ->editColumn('xstatus', function ($ticket) {
                return $ticket->xstatus == 0 ? 
                 '<div class="text-center"><span class="label bg-blue text-center"><i class="fa fa-clock-o"></i> Active</span></div>' 
                : 
                '<div class="text-center"><span class="label bg-green"> <i class="fa fa-check-circle-o"></i> Closed</span></div>';
            })

        ->setRowId('id')
            ->setRowClass(function ($ticket) {
                 return $ticket->ifRead == 0 ? 'warning' : 'info';
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
