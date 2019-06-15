@extends('Backend.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('/admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{asset('/admin/messages')}}">Messages</a></li>
        <li class="breadcrumb-item active">Message from {{$message->name}}</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    {{--<i class="fas fa-table"></i>--}}
                    Message
                </div>
            </div>
        </div>
        <div class="card-body">
            Name : {{$message->name}}<br>
            Email : {{$message->email}}<br>
            Company : {{$message->company}}<hr>
            Message : {{$message->message}}<br>
        </div>
    </div>

@endsection