@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauns ieraksts</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::hidden('report_id', 'Report ID')}}
            {{Form::hidden('report_id', $report_id, ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('veiktās_darbības', 'Veiktās darbības')}}
            {{Form::text('veiktās_darbības', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        <div class="form-group">
            {{Form::label('stāvoklis', 'Stāvoklis')}}
            {{ Form::select('stāvoklis', \App\Models\State::all()->pluck('name', 'id')->toArray(), null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('rīcības_datums', 'Rīcības datums')}}
            {{Form::date('rīcības_datums', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('rīcības_laiks', 'Rīcības laiks')}}
            {{Form::time('rīcības_laiks', Carbon\Carbon::now()->format('H:i'), ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('darbības_persona', 'Darbības persona')}}
            {{Form::text('darbības_persona', '', ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('piezīmes', 'Piezīmes')}}
            {{Form::text('piezīmes', '', ['class' => 'form-control'])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
