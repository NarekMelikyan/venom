@extends('Backend.app')

@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Subcategories</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">
                    <i class="fas fa-table"></i>
                    Data Table Example
                </div>
                <div class="col-md-4" style="text-align: right">
                    <a class="btn btn-success btn-sm" href="{{asset('/admin/create-subcategory')}}">Create</a>
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
                        <th>Category</th>
                        <th style="text-align: right;width: 10%">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->translation->name}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td style="text-align: right">
                                <a class="btn btn-sm btn-success"
                                   href="{{asset('/admin/subcategories/'.$subcategory->id)}}"><i class="fa fa-pen"></i></a>
                                {!! Form::open(['url' => '/admin/subcategories/'.$subcategory->id,'method' => 'delete','style'=>'display:inline-block']) !!}
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
        {{$subcategories->render()}}
    </div>
@endsection