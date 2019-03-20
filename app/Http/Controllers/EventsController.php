<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Events;
use App\Http\Resources\EventResource;


class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        //this function authorizes pass view permission before executing any function in this controller
        $this->middleware(function ($request, $next) {
            try {
                Auth::user()->authorizeRoles(['View Events']);
            } catch (\Exception $e) {
                abort(403);
            }

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
        
        $events = Events::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Responses
     */
    public function create()
    {
        // show the events create form
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
        ]);

		$title      = $request['title'];
		$start_date = $request['start_date'];
		$body       = $request['body'];
		$post       = Post::create($request->only('title', 'start_date', 'child'));

    //Display a successful message upon save
        return redirect()->route('events.index')
            ->with('flash_message', 'Event,
             '. $post->title.' stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // grab all events by start day
        $all_events = CslEvent::orderby('date_start', 'DESC')->get();

        // return view with events variable
        return view('admin.events.index', compact('all_events'));
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
        $event = Events::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);

		$event             = event::findOrFail($id);
		$event->title      = $request->input('title');
		$event->start_date = $request->input('start_date');
		$event->body       = $request->input('body');
        $event->save();

        return redirect()->route('events.show', 
            $event->id)->with('flash_message', 
            'Event, '. $event->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find the event by ID in the event object
		$events = Task::findOrFail($id);

		// delete the event
		$events->delete();

		// return a view with a status message showing the action
		return view('events.index', compact('events'))->with('notice', 'Event title successfully removed.');
    }
}
