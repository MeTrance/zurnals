@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Jauns ieraksts</h3>
    {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('ziņojuma_datums', 'Ziņojuma datums')}}
            {{Form::date('ziņojuma_datums', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('laiks', 'Laiks')}}
            {{Form::time('laiks', Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('atskaitošā_persona', 'Atskaitošā persona')}}
            {{Form::text('atskaitošā_persona', Auth::user()->name, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('avots', 'Avots')}}
            {{ Form::select('avots', \App\Models\Source::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('ziņojuma_apraksts', 'Ziņojuma apraksts')}}
            {{Form::text('ziņojuma_apraksts', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('atrašanās_vieta', 'Atrašanās vieta')}}
            {{ Form::select('atrašanās_vieta', \App\Models\Location::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>


        <div class="form-group">
            {{Form::label('ierīces_tips', 'Ierīces tips')}}
            {{ Form::select('ierīces_tips', \App\Models\Device::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('problēmas_veids', 'Problēmas veids')}}
            {{ Form::select('problēmas_veids', \App\Models\Issue::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('piezīmes', 'Piezīmes')}}
            {{Form::text('piezīmes', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection


