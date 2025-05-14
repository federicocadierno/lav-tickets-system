<?php

namespace App\Http\Controllers;

use App\Jobs\SendNotification;
use Illuminate\Http\Request;
use App\Models\{Tickets, Documents, User};
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function index() 
    {
        $tickets = Tickets::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|integer',
            'product_to_import_export' => 'required|string',
            'country_of_origin_destination' => 'required|string',
        ]);
            
        // Store the file in the public/uploads directory
        $ticket = Tickets::create([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'user_id' => Auth::user()->id,
            'mode_of_transport' => $request->input('mode_of_transport'),
            'product_to_import_export' => $request->input('product_to_import_export'),
            'country_of_origin_destination' => $request->input('country_of_origin_destination'),
            'status' => 'New',
        ]);


        SendNotification::dispatch($ticket);

        // call a job to create a notification
        // pass the ticket id to the job and the status 

        return redirect()->route('tickets.index');

    }

    public function edit($id)
    {
        $ticket = Tickets::findOrFail($id);
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id) 
    {

        $request->validate([
            'name' => 'required|string',
            'type' => 'required|integer',
            'product_to_import_export' => 'required|string',
            'country_of_origin_destination' => 'required|string',
        ]);

        $ticket = Tickets::find($id);
        $ticket->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'mode_of_transport' => $request->input('mode_of_transport'),
            'product_to_import_export' => $request->input('product_to_import_export'),
            'country_of_origin_destination' => $request->input('country_of_origin_destination'),
            'status' => $request->input('status'),
        ]);

        
        
        if ($request->hasFile('document')) {
            
            
            $documents = $request->file('document');
            //dd($documents);
            foreach ($documents as $document) {
                $filename = $document->store('documents', 'public');    
                //dd($filename);
                Documents::create([
                    'doc_id' => $ticket->id,
                    'doc_name' => $filename
                ]);
            }
    
        
          
        }


                // call a job to create a notification
        // pass the ticket id to the job and the status 

        SendNotification::dispatch($ticket);


        return redirect()->route('tickets.index');
    }

    public function destroy(int $id){
        $ticket = Tickets::findOrFail($id);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
