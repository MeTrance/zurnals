@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-top: 20px">Jauns problēmas veids</h3>
        {!! Form::open(['action' => [[\App\Http\Controllers\IssuesController::class, 'store']], 'method' => 'POST'])!!}

        <div class="form-group">
            {{Form::label('name', 'Problēmas veids')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
        </div>

        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary', 'onclick' => "this.disabled=true;this.value='Sending, please wait...';this.form.submit();"])}}
        {!! Form::close() !!}
    </div>


@endsection
