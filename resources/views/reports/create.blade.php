@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Jauns ieraksts<a href="{{route('home')}}" class="btn btn-primary" style="margin-left: 10px">Atpakaļ</a></h3>
    {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('date', 'Ziņojuma datums')}}
            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('time', 'Laiks')}}
            {{Form::time('time', Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('person_id', 'Atskaitošā persona')}}
            {{ Form::select('person_id', \App\Models\User::all()->pluck('name', 'id')->toArray(), auth()->id(),['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('source_id', 'Avots')}}
            {{ Form::select('source_id', \App\Models\Source::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('txt', 'Ziņojuma apraksts')}}
            {{Form::text('txt', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        <div class="form-group">
            {{Form::label('obj_id', 'Atrašanās vieta')}}
            {{ Form::select('obj_id', \App\Models\Location::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>


        <div class="form-group">
            {{Form::label('device_id', 'Ierīces tips')}}
            {{ Form::select('device_id', \App\Models\Device::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('issue_id', 'Problēmas veids')}}
            {{ Form::select('issue_id', \App\Models\Issue::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('note', 'Piezīmes')}}
            {{Form::text('note', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
    {!! Form::close() !!}
    </div>

@endsection


