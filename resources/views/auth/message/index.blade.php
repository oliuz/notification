@extends('layouts.app')
@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col">
                <h1>Notificaciones</h1>
            </div>
            <div class="col-auto">
                <a href="{{route('message.create')}}">
                    <button type="button" class="btn btn-primary">
                        Enviar nuevo mensaje
                    </button>
                </a>
            </div>            
        </div>
        <div class="row mt-4">
            <div class="col-sm-6">
                <h2 class="text-muted">No leidas</h2>
                <ul class="list-group">
                    @foreach ($unreadNotifications as $notification)
                    <li class="list-group-item mb-2">
                        <a href="{{$notification->data['link']}}">
                            {{$notification->data['text']}}
                        </a>                        
                    </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-sm-6">
                <h2 class="text-muted">Leidas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $notification)
                    <li class="list-group-item mb-2">
                        <a href="{{$notification->data['link']}}">
                            {{$notification->data['text']}}
                        </a>                        
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection