@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-bottom: 20px; margin-top: 20px;">Administrātora lapa</h3>
    </div>

    <div class="container" style="padding-left: 70px;">


        <div class="card-group">

            <div class="card" style="width: 18rem; margin-right: 50%;">

                <div class="list-group">
                    <h3 class="list-group-item list-group-item-secondary" style="margin-bottom: 0;">Kategorijas</h3>
                    <a href="{{route('devices.index')}}" class="list-group-item list-group-item-action">Ierīces tips</a>
                    <a href="{{route('sources.index')}}" class="list-group-item list-group-item-action">Avots</a>
                    <a href="{{route('locations.index')}}" class="list-group-item list-group-item-action">Atrašanās vieta</a>
                    <a href="{{route('issues.index')}}" class="list-group-item list-group-item-action">Problēmas veids</a>
                    <a href="{{route('states.index')}}" class="list-group-item list-group-item-action">Stāvoklis</a>
                </div>
            </div>



        </div>

        <div class="card-group" style="">

            <div class="card" style="width: 18rem; margin-right: 50%; margin-top: 20px">
                <div class="list-group">
                    <h3 class="list-group-item list-group-item-secondary" style="margin-bottom: 0;">Lietotāju iestatījumi</h3>
                    <a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action">Lietotāju saraksts</a>
                </div>
            </div>
        </div>
    </div>
@endsection
