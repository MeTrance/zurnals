@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu<a href="{{route('states.index')}}" class="btn btn-primary" style="margin-left: 10px">Atpakaļ</a></h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\StatesController::class, 'update'], $statesdata->id], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Stāvokļa nosaukums')}}
            {{Form::text('name', $statesdata->name, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>

@endsection
