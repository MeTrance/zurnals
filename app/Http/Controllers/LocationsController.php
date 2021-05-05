<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locationsdata = Location::orderBy('id', 'desc')->paginate(30);

        return view('locations.index')->with('locationsdata', $locationsdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $locationsdata = new Location;
        $locationsdata->name = $request->input('name');
        $locationsdata->save();

        return redirect(route('locations.index'))->with('success', 'Ieraksts izveidots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locationsdata = Location::find($id);
        return view('locations.edit')->with('locationsdata', $locationsdata);
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        //Izveidot ierakstu

        $locationsdata = Location::find($id);
        $locationsdata->name = $request->input('name');
        $locationsdata->save();

        return redirect(route('locations.index'))->with('success', 'Ieraksts atjaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $locationsdata = Location::find($id);
        $locationsdata->delete();

        return redirect(route('locations.index'))->with('success', 'Ieraksts izdzēsts');
    }
}
