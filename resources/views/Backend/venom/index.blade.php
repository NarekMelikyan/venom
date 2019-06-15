@extends('Backend.app')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Venom</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <i class="fas fa-table"></i>
                    Data Table Example
                </div>
                <div class="col-md-4" style="text-align: right">
                    <a class="btn btn-success btn-sm" href="{{asset('/admin/create-venom')}}">Create</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>ProductID</th>
                        <th>Name</th>
                        <th style="text-align: right;width: 10%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($venom as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->categoryWithTranslation->name}}</td>
                            <td>{{$item->subcategoryWithTranslation->name}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->translation->name}}</td>
                            <td style="text-align: right">
                                <a class="btn btn-sm btn-success"
                                   href="{{asset('/admin/venom/'.$item->id)}}"><i class="fa fa-pen"></i></a>
                                {!! Form::open(['url' => '/admin/venom/'.$item->id,'method' => 'delete','style'=>'display:inline-block']) !!}
                                <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        {{$venom->render()}}
    </div>
@endsection