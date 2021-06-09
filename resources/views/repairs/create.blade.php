@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauns ieraksts<a href="{{route('repairs.index', $report_id)}}" class="btn btn-primary" style="margin-left: 10px;">Atpakaļ</a></h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::hidden('report_id', 'Report ID')}}
            {{Form::hidden('report_id', $report_id, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('txt', 'Veiktās darbības')}}
            {{Form::text('txt', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('state_id', 'Stāvoklis')}}
            {{ Form::select('state_id', \App\Models\State::all()->pluck('name', 'id')->toArray(), null,['placeholder' => '', 'class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('date', 'Rīcības datums')}}
            {{Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('time', 'Rīcības laiks')}}
            {{Form::time('time', Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('person_id', 'Darbības persona')}}
            {{ Form::select('person_id', \App\Models\User::all()->pluck('name', 'id')->toArray(), auth()->id(),['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('note', 'Piezīmes')}}
            {{Form::text('note', '', ['class' => 'form-control'])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>
@endsection
