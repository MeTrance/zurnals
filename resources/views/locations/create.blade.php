@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauna atrašanās vieta</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\LocationsController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Atrašanās vieta')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>
@endsection
