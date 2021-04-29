@extends('layouts.app')

@section('content')
    <td><a href="/repairs/{{$report_id}}/create" class="btn btn-primary">Pievienot rīcību</a></td>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Report_ID</th>
                <th scope="col">Veiktās darbības</th>
                <th scope="col">Stāvoklis</th>
                <th scope="col">Rīcības datums</th>
                <th scope="col">Rīcības laiks</th>
                <th scope="col">Nedēļa</th>
                <th scope="col">Darbības persona</th>
                <th scope="col">Piezīmes</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @if(count($repairdata) > 0)
                @foreach($repairdata as $data)
                    <tr>
                        <td>{{$data->report_id}}</td>
                        <td>{{$data->veiktās_darbības}}</td>
                        <td>{{$data->stāvoklis}}</td>
                        <td><a href="{{route('repairs.show', $data->id)}}">{{$data->rīcības_datums}}</td>
                        <td>{{date('H:i',strtotime($data->rīcības_laiks))}}</td>
                        <td>{{date('W',strtotime($data->rīcības_datums))}}</td>
                        <td>{{$data->darbības_persona}}</td>
                        <td>{{$data->piezīmes}}</td>

                        <td><a href="/repairs/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                        <td>
                            {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Izdzēst', ['class' => 'btn btn-danger'])!!}
                            {!!Form::close()!!}
                        </td>
                    </tr>

                @endforeach

            @else
                <p>No data</p>
            @endif
            </tbody>
        </table>
    </div>


@endsection
