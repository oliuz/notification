@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Message</h1>
        <div class="mt-4">
            <form action="{{ route('message.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Email</label>
                    <select class="form-control" name="recipient_id" id="exampleFormControlSelect1">
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
        <div class="mt-2">
            @if (session()->has('create'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> {{ session()->get('create') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
    </div>    
@endsection
