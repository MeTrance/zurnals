@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\LocationsController::class, 'update'], $locationsdata->id], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Atrašanās vietas nosaukums')}}
            {{Form::text('name', $locationsdata->name, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection
