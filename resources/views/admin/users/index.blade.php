@extends('layouts.app')

@section('content')


<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Lietotājvārds</th>
            <th scope="col">E-pasts</th>
            <th scope="col">Roles</th>
            <th scope="col">Darbības</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                <td>
                    <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary float-left">Rediģēt</a>

                    {!! Form::open(['action' => [[\App\Http\Controllers\Admin\UsersController::class, 'destroy'], $user->id], 'method' => 'POST', 'class' => 'float-left'])!!}
                    {!!Form::hidden('_method', 'DELETE')!!}
                    {!!Form::submit('Izdzēst', ['class' => 'btn btn-danger'])!!}
                    {!!Form::close()!!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
