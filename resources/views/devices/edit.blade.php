@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
    {!! Form::open(['action' => [[\App\Http\Controllers\DevicesController::class, 'update'], $devicesdata->id], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Ierīces nosaukums')}}
            {{Form::text('name', $devicesdata->name, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection
