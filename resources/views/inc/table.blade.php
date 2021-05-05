<div class="table-responsive">
    <table class="table">
        <thead>
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
                    <td>{{$data->txt}}</td>
                    <td>{{$data->getLocation->name}}</td>
                    <td>{{$data->getDevice->name}}</td>
                    <td>{{$data->getIssue->name}}</td>
                    <td>{{$data->note}}</td>
                    <td><a href="/repairs/{{$data->id}}" class="btn btn-primary">Rīcība</a>

                    </td>
                    <td><a href="/reports/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                    <td>

                        @if($data->getRepair->count() == 0)
                            {!! Form::open(['action' => [[\App\Http\Controllers\ReportsController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
                            {!!Form::hidden('_method', 'DELETE')!!}
                            {!!Form::submit('Izdzēst', ['class' => 'btn btn-danger'])!!}
                            {!!Form::close()!!}
                        @else

                        @endif

                    </td>
                </tr>

            @endforeach

        @else
            <p>No data</p>
        @endif
        </tbody>
    </table>
</div>
{{$tabledata->links()}}
