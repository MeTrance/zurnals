@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'update'], $data->id], 'method' => 'POST'])!!}

        <!-- Kā diez ievietot iepriekšējos laika datus -->
        <div class="form-group">
            {{Form::label('ziņojuma_datums', 'Ziņojuma datums')}}
            {{Form::date('ziņojuma_datums', $data->ziņojuma_datums, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('laiks', 'Laiks')}}
            {{Form::time('laiks', date('H:i',strtotime($data->laiks)), ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::label('atskaitošā_persona', 'Atskaitošā persona')}}
            {{Form::text('atskaitošā_persona', $data->atskaitošā_persona, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('avots', 'Avots')}}
            {{Form::text('avots', $data->avots, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('ziņojuma_apraksts', 'Ziņojuma apraksts')}}
            {{Form::text('ziņojuma_apraksts', $data->ziņojuma_apraksts, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('atrašanās_vieta', 'Atrašanās vieta')}}
            {{Form::text('atrašanās_vieta', $data->atrašanās_vieta, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('ierīces_tips', 'Ierīces tips')}}
            {{Form::text('ierīces_tips', $data->ierīces_tips, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('problēmas_veids', 'Problēmas veids')}}
            {{Form::text('problēmas_veids', $data->problēmas_veids, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        <div class="form-group">
            {{Form::label('piezīmes', 'Piezīmes')}}
            {{Form::text('piezīmes', $data->piezīmes, ['class' => 'form-control', 'placeholder' => 'asd'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection
<!--  Iespējams ir izmantot laravel collective drop down list no db /// text editor lielajiem field ? -->

