@extends('layouts.app')

@section('content')

    <div class="container justify-content-center">
        <h3 style="margin-top: 20px">Ieraksts<a href="{{route('home')}}" class="btn btn-primary" style="margin-left: 10px;">Atpakaļ</a></h3>
        <table class="table" style="text-align: center; margin-top: 20px;">
            <thead>
            <tr>
                <th class="alert-secondary">Ziņojuma datums</th>
                <th>{{$data->date}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Laiks</th>
                <th>{{date('H:i',strtotime($data->time))}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Nedēļa</th>
                <th>{{date('W',strtotime($data->date))}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Atskaitošā persona</th>
                <th>{{$data->getUser->name}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Avots</th>
                <th>{{$data->getSource->name}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Ziņojuma apraksts</th>
                <th>{{$data->txt}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Atrašanās vieta</th>
                <th>{{$data->getLocation->name}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Ierīces tips</th>
                <th>{{$data->getDevice->name}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Problēmas veids</th>
                <th>{{$data->getIssue->name}}</th>
            </tr>
            <tr>
                <th class="alert-danger">Piezīmes</th>
                <th>{{$data->note}}</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        @can('update', $data)
        <a href="/reports/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a>
        @endcan
    </div>
@endsection
