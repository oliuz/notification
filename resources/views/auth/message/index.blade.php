@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito!</strong> {{ session()->get('update') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('destroy'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito!</strong> {{ session()->get('destroy') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
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
                            <form class="float-right" action="{{ route('message.update',$notification->id) }}" method="post">
                                @csrf @method('patch')
                                <button class="btn btn-danger btn-sm">x</button>
                            </form>
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
                            <form class="float-right" action="{{ route('message.destroy',$notification->id) }}" method="post">
                                @csrf @method('delete')
                                <button class="btn btn-danger btn-sm">x</button>
                            </form>
                        </a>                        
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection