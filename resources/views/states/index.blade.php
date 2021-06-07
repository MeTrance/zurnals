@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="{{route('admin')}}" class="btn btn-primary">Atpakaļ</a>
                <a href="{{route('states.create')}}" class="btn btn-primary">Pievienot stāvokli</a>
            </div>
            <div class="col-md-4"></div>
        </div>
    <div class="table-responsive table-bordered">
        <table class="table" style="margin-bottom: 0;">
            <thead class="thead-light">
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
                        <td style="width: 100px"><a href="{{route('states.edit', ['state' => $data->id])}}" class="btn btn-primary">Rediģēt</a></td>
                        <td style="width: 100px">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                Izdzēst
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" data-backdrop="false" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modalSmallLabel" aria-hidden="true">
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
                                            {!! Form::open(['action' => [[\App\Http\Controllers\StatesController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
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
                <p>No data</p>
            @endif
            </tbody>
        </table>
    </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">{{$statesdata->links()}}</div>
            <div class="col-md-4"></div>
        </div>
    </div>

@endsection
