@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{route('home')}}" class="btn btn-primary">Atpakaļ</a>
                @can('repair')
                <a href="{{route('repairs.create', $report_id)}}" class="btn btn-primary">Pievienot rīcību</a>
                @endcan
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div class="table-responsive table-bordered">
        <table class="table" style="margin-bottom: 0;">
            <thead class="thead-light">
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
                        <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;">{{$data->txt}}</td>
                        <td>{{$data->getState->name}}</td>
                        <td><a href="{{route('repairs.show', $data->id)}}">{{$data->date}}</td>
                        <td>{{date('H:i',strtotime($data->time))}}</td>
                        <td>{{date('W',strtotime($data->date))}}</td>
                        <td>{{$data->getUser->name}}</td>
                        <td>{{$data->note}}</td>
                        @can('update', $data)
                        <td style="width: 100px"><a href="/repairs/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                        @endcan
                        @can('delete', $data)
                        <td style="width: 100px">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$data->id}}">
                                Izdzēst
                            </button>
                        @endcan
                            <!-- Modal -->
                            <div class="modal fade" data-backdrop="false" id="deleteModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSmallLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalSmallLabel">Izdzēst</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                Vai patiešām vēlaties izdzēst ierakstu?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Nē</button>
                                            {!! Form::open(['action' => [[\App\Http\Controllers\RepairsController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
                                            {!!Form::hidden('_method', 'DELETE')!!}
                                            {!!Form::submit('Izdzēst', ['class' => 'btn btn-danger'])!!}
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>

                    </tr>

                @endforeach

            @else
                <!-- NO DATA -->
            @endif
            </tbody>
        </table>
    </div>


@endsection
