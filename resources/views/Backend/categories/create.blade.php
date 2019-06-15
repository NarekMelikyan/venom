@extends('Backend.app')

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('/admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{asset('/admin/categories')}}">Categories</a></li>
        <li class="breadcrumb-item active">Create category</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    {{--<i class="fas fa-table"></i>--}}
                    Create category
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/categories','method' => 'POST', 'files' => 'true']) !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($languages as $language)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name on {{$language->name}}</label>
                            <input name="name[{{$language->lang}}]" class="form-control" id="name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description on {{$language->name}}</label>
                            <textarea name="description[{{$language->lang}}]" class="form-control" id="name"></textarea>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input name="image" class="form-control" id="image" type="file">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: right">
                    <a href="{{asset('/admin/categories')}}" class="btn btn-danger btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection