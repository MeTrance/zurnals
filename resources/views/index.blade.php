@extends('layouts.app')

@section('content')
        @can('report')
        <div class="container" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><a href="{{route('reports.create')}}" class="btn btn-primary">Pievienot ziņojumu</a></div>
                <div class="col-md-4"></div>
            </div>
        </div>
        @endcan
        <div class="table-responsive table-bordered">
            <table class="table" style="margin-bottom: 0;">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Ziņojuma datums</th>
                    <th scope="col">Laiks</th>
                    <th scope="col">Nedēļa</th>
                    <th scope="col">Atskaitošā persona</th>
                    <th scope="col">Avots</th>
                    <th scope="col">Ziņojuma apraksts</th>
                    <th scope="col">Atrašanās vieta</th>
                    <th scope="col">Ierīces tips</th>
                    <th scope="col">Problēmas veids</th>
                    <th scope="col">Piezīmes</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                @if(count($tabledata) > 0)
                    @foreach($tabledata as $data)

                        <tr>
                            <td><a href="/reports/{{$data->id}}">{{$data->date}}</a></td>
                            <td>{{date('H:i',strtotime($data->time))}}</td>
                            <td>{{date('W',strtotime($data->date))}}</td>
                            <td>{{$data->getUser->name}}</td>
                            <td>{{$data->getSource->name}}</td>
                            <td style="word-wrap: break-word;min-width: 200px;max-width: 200px;">{{$data->txt}}</td>
                            <td>{{$data->getLocation->name}}</td>
                            <td>{{$data->getDevice->name}}</td>
                            <td>{{$data->getIssue->name}}</td>
                            <td>{{$data->note}}</td>
                            @can('repair')
                            <td style="width: 100px"><a href="/repairs/{{$data->id}}" class="btn btn-primary">Rīcība</a></td>
                            @endcan
                            @can('update', $data)
                            <td style="width: 100px"><a href="/reports/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                            @endcan
                            <td style="width: 100px">
                                <!-- Button trigger modal -->
                                @can('delete', $data)
                                @if($data->getRepair->count() == 0)
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                        Izdzēst
                                    </button>
                            @else

                            @endif
                            @endcan

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

                                                {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
                                                {!!Form::hidden('_method', 'DELETE')!!}
                                                {!!Form::submit('Jā', ['class' => 'btn btn-danger'])!!}
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
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">{{$tabledata->links()}}</div>
                <div class="col-md-4">
            </div>
        </div>

@endsection
