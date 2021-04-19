@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <table class="table" style="text-align: center; margin-top: 20px;">
            <thead>
            <tr>
                <th class="alert-secondary">Ziņojuma datums</th>
                <th>{{$data->ziņojuma_datums}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Laiks</th>
                <th>{{$data->laiks}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Nedēļa</th>
                <th>{{$data->nedēļa}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Atskaitošā persona</th>
                <th>{{$data->atskaitošā_persona}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Avots</th>
                <th>{{$data->avots}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Ziņojuma apraksts</th>
                <th>{{$data->ziņojuma_apraksts}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Atrašanās vieta</th>
                <th>{{$data->atrašanās_vieta}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Ierīces tips</th>
                <th>{{$data->ierīces_tips}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Problēmas veids</th>
                <th>{{$data->problēmas_veids}}</th>
            </tr>
            <tr>
                <th class="alert-danger">Piezīmes</th>
                <th>{{$data->piezīmes}}</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
