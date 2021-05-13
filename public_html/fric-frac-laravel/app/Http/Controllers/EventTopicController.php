<?php

namespace App\Http\Controllers;

use App\EventTopic;
use Illuminate\Http\Request;

class EventTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventTopic = EventTopic::all();
        return view('eventtopic.index', compact('eventTopic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventtopic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        EventTopic::create($request->all());
        return redirect()->route('eventtopic.index')
            ->with('success', 'EventTopic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventTopic  $eventTopic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventTopic = EventTopic::find($id);
        return view('eventtopic.show', compact('eventTopic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventTopic  $eventTopic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventTopic = EventTopic::find($id);
        return view('eventtopic.edit', compact('eventTopic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventTopic  $eventTopic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required'
        ]);
        $eventTopic = EventTopic::find($id);
        $eventTopic->name = $request->input('name');
        $eventTopic->save();
        return redirect()->route('eventtopic.index')
            ->with('success', 'EventTopic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventTopic  $eventTopic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventTopic = Eventtopic::find($id);
        $eventTopic->delete();
        return redirect()->route('eventtopic.index')->with('success', 'EventTopic deleted successfully.');
    }
}
