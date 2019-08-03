@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Notificaciones Show</h1>
            </div>
            <div class="col-12 mt-3">
                <p>{{$notification->sender->name}} - {{$notification->created_at->diffForHumans()}}</p>
                <p>{{$notification->body}}</p>
            </div>  
        </div>
    </div>
@endsection