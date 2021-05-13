<?php
/*
https://www.positronx.io/php-laravel-crud-operations-mysql-tutorial/
https://www.itsolutionstuff.com/post/laravel-7-crud-example-laravel-7-tutorial-for-beginnersexample.html
*/
namespace App\Http\Controllers;

use App\EventCategory;
use Illuminate\Http\Request;
class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventCategory = EventCategory::all();
        return view('eventcategory.index', compact('eventCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eventcategory.create');
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
        EventCategory::create($request->all());
        return redirect()->route('eventcategory.index')
            ->with('success', 'EventCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventCategory = EventCategory::find($id);
        return view('eventcategory.show', compact('eventCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventCategory = EventCategory::find($id);
        return view('eventcategory.edit', compact('eventCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required'
        ]);
        $eventCategory = EventCategory::find($id);
        $eventCategory->name = $request->input('name');
        $eventCategory->save();
        return redirect()->route('eventcategory.index')
            ->with('success', 'event category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventCategory  $eventCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eventCategory = EventCategory::find($id);
        $eventCategory->delete();


        return redirect()->route('eventcategory.index')->with('success', 'event category deleted successfully.');
    }
}
