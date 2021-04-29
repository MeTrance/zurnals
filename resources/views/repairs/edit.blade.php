@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
    {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'update'], $data->id], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('veiktās_darbības', 'Veiktās darbības')}}
            {{Form::text('veiktās_darbības', $data->veiktās_darbības, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('stāvoklis', 'Stāvoklis')}}
            {{Form::text('stāvoklis', $data->stāvoklis, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('rīcības_datums', 'Rīcības datums')}}
            {{Form::date('rīcības_datums', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('rīcības_laiks', 'Rīcības laiks')}}
            {{Form::time('rīcības_laiks', date('H:i',strtotime($data->laiks)), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('darbības_persona', 'Darbības persona')}}
            {{Form::text('darbības_persona', $data->darbības_persona, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('piezīmes', 'Piezīmes')}}
            {{Form::text('piezīmes', $data->piezīmes, ['class' => 'form-control'])}}
        </div>


        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
