@extends('layouts.app')

@section('content')
    <td><a href="/repairs/{{$report_id}}/create" class="btn btn-primary">Pievienot rīcību</a></td>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
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
                        <td>{{$data->txt}}</td>
                        <td>{{$data->getState->name}}</td>
                        <td><a href="{{route('repairs.show', $data->id)}}">{{$data->date}}</td>
                        <td>{{date('H:i',strtotime($data->time))}}</td>
                        <td>{{date('W',strtotime($data->date))}}</td>
                        <td>{{$data->getUser->name}}</td>
                        <td>{{$data->note}}</td>
                        @can('update', $data)
                        <td><a href="/repairs/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                        @endcan
                        @can('delete', $data)
                        <td>
                            {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Izdzēst', ['class' => 'btn btn-danger'])!!}
                            {!!Form::close()!!}
                        </td>
                        @endcan
                    </tr>

                @endforeach

            @else
                <p>No data</p>
            @endif
            </tbody>
        </table>
    </div>


@endsection
