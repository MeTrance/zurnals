<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\State;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issuesdata = Issue::orderBy('id', 'desc')->paginate(30);

        return view('issues.index')->with('issuesdata', $issuesdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
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

        $issuesdata = new Issue;
        $issuesdata->name = $request->input('name');
        $issuesdata->save();

        return redirect(route('issues.index'))->with('success', 'Ieraksts izveidots');
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
        $issuesdata = Issue::find($id);
        return view('issues.edit')->with('issuesdata', $issuesdata);
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

        $issuesdata = Issue::find($id);
        $issuesdata->name = $request->input('name');
        $issuesdata->save();

        return redirect(route('issues.index'))->with('success', 'Ieraksts atjaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $issuesdata = Issue::find($id);
        $issuesdata->delete();

        return redirect(route('issues.index'))->with('success', 'Ieraksts izdzēsts');
    }
}
