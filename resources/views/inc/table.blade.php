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
        </tr>
        </thead>
        <tbody>
        @if(count($tabledata) > 0)
            @foreach($tabledata as $data)
                <tr>
                    <td><a href="/{{$data->id}}">{{$data->ziņojuma_datums}}</a></td>
                    <td>{{$data->laiks}}</td>
                    <td>{{$data->nedēļa}}</td>
                    <td>{{$data->atskaitošā_persona}}</td>
                    <td>{{$data->avots}}</td>
                    <td>{{$data->ziņojuma_apraksts}}</td>
                    <td>{{$data->atrašanās_vieta}}</td>
                    <td>{{$data->ierīces_tips}}</td>
                    <td>{{$data->problēmas_veids}}</td>
                    <td>{{$data->piezīmes}}</td>
                    <td><a href="/tables/{{$data->id}}/edit" class="btn btn-primary">Rediģēt</a></td>
                    <td>
                        {!! Form::open(['action' => [[\App\Http\Controllers\TablesController::class, 'destroy'], $data->id], 'method' => 'POST'])!!}
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
{{$tabledata->links()}}
