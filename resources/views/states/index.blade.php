@extends('layouts.app')

@section('content')
    <td><a href="{{route('states.create')}}" class="btn btn-primary">Pievienot stāvokli</a></td>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nosaukums</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @if(count( $statesdata) > 0)
                @foreach($statesdata as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td><a href="{{route('states.edit', ['state' => $data->id])}}" class="btn btn-primary">Rediģēt</a></td>
                        <td>
                            {!! Form::open(['action' => [[\App\Http\Controllers\StatesController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
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
    {{$statesdata->links()}}
@endsection
