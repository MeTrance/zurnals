@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        <h3>Administrātora lapa</h3>

        <h3 style="padding-top: 20px;">Kategorijas</h3>
        <div class="card-group">

        <div class="card" style="width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Ierīces tips</h5>
                <a class="btn btn-primary" href="{{route('devices.index')}}" role="button">Saraksts</a>
                <a class="btn btn-primary" href="{{route('devices.create')}}" role="button">Pievienot</a>
            </div>
        </div>

        <div class="card" style="width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Avots</h5>
                <a class="btn btn-primary" href="{{route('sources.index')}}" role="button">Saraksts</a>
                <a class="btn btn-primary" href="{{route('sources.create')}}" role="button">Pievienot</a>
            </div>
        </div>

        <div class="card" style="width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Atrašanās vieta</h5>
                <a class="btn btn-primary" href="{{route('locations.index')}}" role="button">Saraksts</a>
                <a class="btn btn-primary" href="{{route('locations.create')}}" role="button">Pievienot</a>
            </div>
        </div>

        <div class="card" style="width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Problēmas veids</h5>
                <a class="btn btn-primary" href="{{route('issues.index')}}" role="button">Saraksts</a>
                <a class="btn btn-primary" href="{{route('issues.create')}}" role="button">Pievienot</a>
            </div>
        </div>

        <div class="card" style="width: 18rem; margin-right: 10px">
            <div class="card-body">
                <h5 class="card-title">Stāvoklis</h5>
                <a class="btn btn-primary" href="{{route('states.index')}}" role="button">Saraksts</a>
                <a class="btn btn-primary" href="{{route('states.create')}}" role="button">Pievienot</a>
            </div>
        </div>
        </div>
    </div>
@endsection
