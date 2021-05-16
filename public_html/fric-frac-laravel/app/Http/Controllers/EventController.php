<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\EventTopic;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        return view('event.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventTopic = EventTopic::all();
        $eventCategory = EventCategory::all();
        return view('event.create', compact('eventTopic', 'eventCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);
        Event::create($request->all());
        return redirect()->route('event.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $eventTopic = EventTopic::all();
        $eventCategory = EventCategory::all();
        return view('event.show', compact('event', 'eventCategory', 'eventTopic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $eventTopic = EventTopic::all();
        $eventCategory = EventCategory::all();
        return view('event.edit', compact('event', 'eventTopic', 'eventCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $event = Event::find($id);
        $event->name = $request->input('name');
        $event->location = $request->input('location');
        $event->starts = $request->input('starts');
        $event->ends = $request->input('ends');
        $event->image = $request->input('image');
        $event->description = $request->input('description');
        $event->organiserName = $request->input('organiserName');
        $event->organiserDescription = $request->input('organiserDescription');
        $event->eventCategoryId = $request->input('eventCategoryId');
        $event->eventTopicId = $request->input('eventTopicId');
        $event->save();
        return redirect()->route('event.index')
            ->with('success', 'event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('event.index')->with('success', 'event deleted successfully.');
    }
}
