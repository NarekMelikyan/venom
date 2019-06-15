@extends('Backend.app')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <i class="fas fa-table"></i>
                    Data Table Example
                </div>
                <div class="col-md-4" style="text-align: right">

                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        {{--<th>Message</th>--}}
                        <th style="text-align: right;width: 10%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        @if($message->status == 0)
                            <tr style="font-weight: bold">
                                <td>{{$message->id}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->company}}</td>
{{--                                <td>{{$message->message}}</td>--}}
                                <td style="text-align: right;font-weight: normal">
                                    <a class="btn btn-sm btn-info"
                                       href="{{asset('/admin/messages/'.$message->id)}}"><i class="fa fa-eye"></i></a>
                                    {!! Form::open(['url' => '/admin/messages/'.$message->id,'method' => 'delete','style'=>'display:inline-block']) !!}
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{$message->id}}</td>
                                <td>{{$message->name}}</td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->company}}</td>
                                {{--<td>{{$message->message}}</td>--}}
                                <td style="text-align: right">
                                    <a class="btn btn-sm btn-info"
                                       href="{{asset('/admin/messages/'.$message->id)}}"><i class="fa fa-eye"></i></a>
                                    {!! Form::open(['url' => '/admin/messages/'.$message->id,'method' => 'delete','style'=>'display:inline-block']) !!}
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        {{$messages->render()}}
    </div>
@endsection