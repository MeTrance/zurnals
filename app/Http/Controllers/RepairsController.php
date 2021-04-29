<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use App\Models\Report;

class RepairsController extends Controller
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

    public function index($id)
    {
        //$repairdata = Repair::orderBy('rīcības_datums', 'desc')->paginate(30);
        $repairdata = Repair::where('report_id', $id)->get();
        return view('repairs.index')->with('repairdata', $repairdata)->with('report_id', $id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($report_id)
    {
        return view('repairs.create')->with('report_id', $report_id);
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
            //'veiktās_darbības' => 'required',
        ]);

        //Izveidot ierakstu

        $repairdata = new Repair;

        $repairdata->report_id = $request->input('report_id');
        $repairdata->veiktās_darbības = $request->input('veiktās_darbības');
        $repairdata->stāvoklis = $request->input('stāvoklis');
        $repairdata->rīcības_datums = $request->input('rīcības_datums');
        $repairdata->rīcības_laiks = $request->input('rīcības_laiks');
        $repairdata->darbības_persona = $request->input('darbības_persona');
        $repairdata->piezīmes = $request->input('piezīmes');
        $repairdata->save();

        return redirect(route('repairs.index', $request->input('report_id')))->with('success', 'Ieraksts izveidots');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repairdata = Repair::find($id);
        return view('repairs.show')->with('data', $repairdata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repairdata = Repair::find($id);
        return view('repairs.edit')->with('data', $repairdata);
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
            //'ziņojuma_datums' => 'required',
        ]);

        //Izveidot ierakstu

        $repairdata = Repair::find($id);
        //$repairdata->report_id = $request->input('report_id');
        $repairdata->veiktās_darbības = $request->input('veiktās_darbības');
        $repairdata->stāvoklis = $request->input('stāvoklis');
        $repairdata->rīcības_datums = $request->input('rīcības_datums');
        $repairdata->rīcības_laiks = $request->input('rīcības_laiks');
        $repairdata->darbības_persona = $request->input('darbības_persona');
        $repairdata->piezīmes = $request->input('piezīmes');
        $repairdata->save();

        return redirect(route('repairs.index', $repairdata->report_id))->with('success', 'Ieraksts atjaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $repairdata = Repair::find($id);
        $repairdata->delete();

        return redirect(route('repairs.index', $repairdata->report_id))->with('success', 'Ieraksts izdzēsts');
    }
}
