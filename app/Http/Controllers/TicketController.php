<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticket;
    public function __construct(Ticket $ticket){

        $this->ticket = $ticket;

    }
    public function ticketList(){

        if(auth()->user()->role == 'user'){

            $tickets = $this->ticket::where('id',Auth::id())->get();
        }
        else {

            $tickets = $this->ticket::all();
        }

        return view('tickets.list',['tickets'=>$tickets]);
    }


    public function createTicket(){

        return view('tickets.create');

    }

     /**
     * Stored a newly created ticket.
     */
    public function storeTicket(StoreTicketRequest $request) : RedirectResponse
    {
        Ticket::create($request->all());
        return redirect()->route('tickets.list')
                ->withSuccess('New ticket is added successfully.');

    }

    

    
}
