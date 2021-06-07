@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <a href="{{route('admin')}}" class="btn btn-primary">Atpakaļ</a>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="table-responsive table-bordered">
    <table class="table" style="margin-bottom: 0;">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Lietotājvārds</th>
            <th scope="col">E-pasts</th>
            <th scope="col">Roles</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                <td style="width: 100px"><a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary float-left">Rediģēt</a></td>
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
                                    {!! Form::open(['action' => [[\App\Http\Controllers\Admin\UsersController::class, 'destroy'], $user->id], 'method' => 'POST', 'class' => 'float-left'])!!}
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
        </tbody>
    </table>
</div>
</div>
@endsection
