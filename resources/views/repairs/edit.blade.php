@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu<a href="{{route('repairs.index', $data->report_id)}}" class="btn btn-primary" style="margin-left: 10px;">Atpakaļ</a></h3>
    {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'update'], $data->id], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('txt', 'Veiktās darbības')}}
            {{Form::text('txt', $data->txt, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('state_id', 'Stāvoklis')}}
            {{ Form::select('state_id', \App\Models\State::all()->pluck('name', 'id')->toArray(), $data->getState->id,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('date', 'Rīcības datums')}}
            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('time', 'Rīcības laiks')}}
            {{Form::time('time', date('H:i',strtotime($data->time)), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('person_id', 'Darbības persona')}}
            {{ Form::select('person_id', \App\Models\User::all()->pluck('name', 'id')->toArray(), $data->getUser->id,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('note', 'Piezīmes')}}
            {{Form::text('note', $data->note, ['class' => 'form-control'])}}
        </div>


        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>
@endsection
