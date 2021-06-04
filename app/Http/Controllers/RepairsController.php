<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Gate;

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

        // Pārbaude vai eksistē reports :: Jāpievieno error ziņa
        if(Report::find($id) == null){
            return redirect('/');
        }else{
            $repairdata = Repair::where('report_id', $id)->get();
            return view('repairs.index')->with('repairdata', $repairdata)->with('report_id', $id);
        }
        //$repairdata = Repair::orderBy('rīcības_datums', 'desc')->paginate(30);


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
        $repairdata->txt = $request->input('txt');
        $repairdata->state_id = $request->input('state_id');
        $repairdata->date = $request->input('date');
        $repairdata->time = $request->input('time');
        $repairdata->person_id = $request->input('person_id');
        $repairdata->note = $request->input('note');
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
        $repairdata->txt = $request->input('txt');
        $repairdata->state_id = $request->input('state_id');
        $repairdata->date = $request->input('date');
        $repairdata->time = $request->input('time');
        $repairdata->person_id = $request->input('person_id');
        $repairdata->note = $request->input('note');
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
