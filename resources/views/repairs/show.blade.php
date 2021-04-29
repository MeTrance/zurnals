@extends('layouts.app')

@section('content')
    <div class="container justify-content-center">
        <table class="table" style="text-align: center; margin-top: 20px;">
            <thead>
            <tr>
                <th class="alert-secondary">Report ID</th>
                <th>{{$data->report_id}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Veiktās darbības</th>
                <th>{{$data->veiktās_darbības}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Stāvoklis</th>
                <th>{{$data->stāvoklis}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Rīcības datums</th>
                <th>{{$data->rīcības_datums}}</th>
            </tr>
            <tr>
                <th class="alert-secondary">Rīcības laiks</th>
                <th>
                    @if($data->rīcības_laiks == null)
                    @else
                        {{date('H:i',strtotime($data->rīcības_laiks))}}
                    @endif
                </th>
            </tr>
            <tr>
                <th class="alert-secondary">Nedēļa</th>
                <th>
                    @if($data->rīcības_datums == null)
                    @else
                        {{date('W',strtotime($data->rīcības_datums))}}
                    @endif
                </th>
            </tr>
            <tr>
                <th class="alert-secondary">Darbības persona</th>
                <th>{{$data->darbības_persona}}</th>
            </tr>
            <tr>
                <th class="alert-danger">Piezīmes</th>
                <th>{{$data->piezīmes}}</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <a href="{{$data->id}}/edit" class="btn btn-primary">Rediģēt rīcību</a>
    </div>
@endsection

