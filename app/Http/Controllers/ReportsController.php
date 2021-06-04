<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Report;
use App\Policies\ReportPolicy;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $tabledata = Report::orderBy('date', 'desc')->paginate(30);

        return view('index')->with('tabledata', $tabledata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('reports.create');
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
            'date' => 'required',
        ]);

        //Izveidot ierakstu

        $tabledata = new Report;
        $tabledata->date = $request->input('date');
        $tabledata->time = $request->input('time');
        $tabledata->person_id = $request->input('person_id');
        $tabledata->source_id = $request->input('source_id');
        $tabledata->txt = $request->input('txt');
        $tabledata->obj_id = $request->input('obj_id');
        $tabledata->device_id = $request->input('device_id');
        $tabledata->issue_id = $request->input('issue_id');
        $tabledata->note = $request->input('note');

        //$repairdata = new Repair;
        //$repairdata->report_id = Report::GetNextId();

        $tabledata->save();
        //$repairdata->save();

        return redirect('/')->with('success', 'Ieraksts izveidots');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repair_id = Report::find('report_id');
        $tabledata = Report::find($id);
        return view('reports.show')->with('data', $tabledata, $repair_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $tabledata = Report::find($id);
        return view('reports.edit')->with('data', $tabledata);
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
            'date' => 'required',
        ]);

        //Izveidot ierakstu

        $tabledata = Report::find($id);
        $tabledata->date = $request->input('date');
        $tabledata->time = $request->input('time');
        //$tabledata->nedēļa = $request->input('nedēļa');
        $tabledata->person_id = $request->input('person_id');
        $tabledata->source_id = $request->input('source_id');
        $tabledata->txt = $request->input('txt');
        $tabledata->obj_id = $request->input('obj_id');
        $tabledata->device_id = $request->input('device_id');
        $tabledata->issue_id = $request->input('issue_id');
        $tabledata->note = $request->input('note');
        $tabledata->save();

        return redirect('/')->with('success', 'Ieraksts atjaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tabledata = Report::find($id);
        $tabledata->delete();

        return redirect('/')->with('success', 'Ieraksts izdzēsts');
    }


}
