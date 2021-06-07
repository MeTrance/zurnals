@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauns ierīces tips<a href="{{route('devices.index')}}" class="btn btn-primary" style="margin-left: 10px">Atpakaļ</a></h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\DevicesController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Ierīces nosaukums')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>

@endsection
