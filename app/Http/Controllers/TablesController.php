<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;


class TablesController extends Controller
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
        $tabledata = Table::orderBy('ziņojuma_datums', 'desc')->paginate(30);
        return view('index')->with('tabledata', $tabledata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('table.create');
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
            'ziņojuma_datums' => 'required',
        ]);

        //Izveidot ierakstu

        $tabledata = new Table;
        $tabledata->ziņojuma_datums = $request->input('ziņojuma_datums');
        $tabledata->laiks = $request->input('laiks');
        //$tabledata->nedēļa = $request->input('nedēļa');
        $tabledata->atskaitošā_persona = $request->input('atskaitošā_persona');
        $tabledata->avots = $request->input('avots');
        $tabledata->ziņojuma_apraksts = $request->input('ziņojuma_apraksts');
        $tabledata->atrašanās_vieta = $request->input('atrašanās_vieta');
        $tabledata->ierīces_tips = $request->input('ierīces_tips');
        $tabledata->problēmas_veids = $request->input('problēmas_veids');
        $tabledata->piezīmes = $request->input('piezīmes');
        $tabledata->save();

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
        $tabledata = Table::find($id);
        return view('table.show')->with('data', $tabledata);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabledata = Table::find($id);
        return view('table.edit')->with('data', $tabledata);
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
            'ziņojuma_datums' => 'required',
        ]);

        //Izveidot ierakstu

        $tabledata = Table::find($id);
        $tabledata->ziņojuma_datums = $request->input('ziņojuma_datums');
        $tabledata->laiks = $request->input('laiks');
        //$tabledata->nedēļa = $request->input('nedēļa');
        $tabledata->atskaitošā_persona = $request->input('atskaitošā_persona');
        $tabledata->avots = $request->input('avots');
        $tabledata->ziņojuma_apraksts = $request->input('ziņojuma_apraksts');
        $tabledata->atrašanās_vieta = $request->input('atrašanās_vieta');
        $tabledata->ierīces_tips = $request->input('ierīces_tips');
        $tabledata->problēmas_veids = $request->input('problēmas_veids');
        $tabledata->piezīmes = $request->input('piezīmes');
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
        $tabledata = Table::find($id);
        $tabledata->delete();

        return redirect('/')->with('success', 'Ieraksts izdzēsts');
    }


}
