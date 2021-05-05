@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'update'], $data->id], 'method' => 'POST'])!!}

        <!-- Kā diez ievietot iepriekšējos laika datus -->
        <div class="form-group">
            {{Form::label('date', 'Ziņojuma datums')}}
            {{Form::date('date', $data->date, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('time', 'Laiks')}}
            {{Form::time('time', date('H:i',strtotime($data->time)), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('person_id', 'Atskaitošā persona')}}
            {{ Form::select('person_id', \App\Models\User::all()->pluck('name', 'id')->toArray(), $data->getUser->id, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('source_id', 'Avots')}}
            {{Form::select('source_id', \App\Models\Source::all()->pluck('name', 'id')->toArray(), $data->getSource->id, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('txt', 'Ziņojuma apraksts')}}
            {{Form::text('txt', $data->txt, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('obj_id', 'Atrašanās vieta')}}
            {{Form::select('obj_id', \App\Models\Location::all()->pluck('name', 'id')->toArray(), $data->getLocation->id, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('device_id', 'Ierīces tips')}}
            {{Form::select('device_id', \App\Models\Device::all()->pluck('name', 'id')->toArray(), $data->getDevice->id, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('issue_id', 'Problēmas veids')}}
            {{Form::select('issue_id', \App\Models\Issue::all()->pluck('name', 'id')->toArray(), $data->getIssue->id, ['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('note', 'Piezīmes')}}
            {{Form::text('note', $data->note, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
<!--  Iespējams ir izmantot laravel collective drop down list no db /// text editor lielajiem field ? -->

