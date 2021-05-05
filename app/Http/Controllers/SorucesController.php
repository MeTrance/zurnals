<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Source;
use Illuminate\Http\Request;

class SorucesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sourcesdata = Source::orderBy('id', 'desc')->paginate(30);

        return view('sources.index')->with('sourcesdata', $sourcesdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sources.create');
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

        $sourcesdata = new Source;
        $sourcesdata->name = $request->input('name');
        $sourcesdata->save();

        return redirect(route('sources.index'))->with('success', 'Ieraksts izveidots');
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
        $sourcesdata = Source::find($id);
        return view('sources.edit')->with('sourcesdata', $sourcesdata);
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

        $sourcesdata = Source::find($id);
        $sourcesdata->name = $request->input('name');
        $sourcesdata->save();

        return redirect(route('sources.index'))->with('success', 'Ieraksts atjaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sourcesdata = Source::find($id);
        $sourcesdata->delete();

        return redirect(route('sources.index'))->with('success', 'Ieraksts izdzēsts');
    }
}
