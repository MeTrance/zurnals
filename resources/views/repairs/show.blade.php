@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <h3 style="margin-top: 20px">Ieraksts<a href="{{route('repairs.index', $data->report_id)}}" class="btn btn-primary" style="margin-left: 10px;">Atpakaļ</a></h3>
        <table class="table" style="text-align: center; margin-top: 20px;">
            <thead>
            <tr>
                <th class="alert-secondary">Report ID</th>
                <th>{{$data->report_id}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Veiktās darbības</th>
                <th>{{$data->txt}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Stāvoklis</th>
                <th>{{$data->getState->name}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Rīcības datums</th>
                <th>{{$data->date}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Rīcības laiks</th>
                <th>
                    @if($data->time == null)
                    @else
                        {{date('H:i',strtotime($data->time))}}
                    @endif
                </th>
            </tr>
            <tr>
                <th class="alert-secondary">Nedēļa</th>
                <th>
                    @if($data->date == null)
                    @else
                        {{date('W',strtotime($data->date))}}
                    @endif
                </th>
            </tr>
            <tr>
                <th class="alert-secondary">Darbības persona</th>
                <th>{{$data->getUser->name}}</th>
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
        <a href="/repairs/{{$data->id}}/edit" class="btn btn-primary">Rediģēt rīcību</a>
        @endcan
    </div>
@endsection

