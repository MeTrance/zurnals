@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauns avots</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\SorucesController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Avots')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>
@endsection
