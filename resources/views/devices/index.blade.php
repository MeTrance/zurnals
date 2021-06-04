@extends('layouts.app')

@section('content')
    <td><a href="{{route('devices.create')}}" class="btn btn-primary">Pievienot ierīci</a></td>
    <div class="table-responsive table-bordered">
        <table class="table" style="margin-bottom: 0;">
            <thead>
            <tr>
                <th scope="col">Nosaukums</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>



            @if(count( $devicesdata) > 0)
                @foreach($devicesdata as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td><a href="{{route('devices.edit', ['device' => $data->id])}}" class="btn btn-primary">Rediģēt</a></td>
                        <td>



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
                                            {!! Form::open(['action' => [[\App\Http\Controllers\DevicesController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
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
    {{$devicesdata->links()}}

@endsection
