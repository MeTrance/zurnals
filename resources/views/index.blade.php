@extends('layouts.app')

@section('content')
    <a href="{{route('reports.create')}}" class="btn btn-primary">Pievienot ziņojumu</a>
    @include('inc/table')
@endsection
