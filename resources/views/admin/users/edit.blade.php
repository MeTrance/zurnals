@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
    <div class="card">
        <div class="card-header">
            <h3 style="margin-top: 20px">Rediģēt ierakstu</h3>
            <p>Edit user {{$user->name}}</p>
        </div>

    {!! Form::open(['action' => [[\App\Http\Controllers\Admin\UsersController::class, 'update'], $user->id], 'method' => 'POST'])!!}
        <div class="card-body">



        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="email" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>
            <div class="col-md-6">
        @foreach($roles as $role)
            <div class="form-group">
                {{Form::label('role', $role->name)}}
                {{ Form::checkbox('roles[]',$role->id, $user->roles->pluck('id')->contains($role->id))}}
            </div>
        @endforeach
            </div>
        </div>

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Saglabāt', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
    </div>
</div>
@endsection
