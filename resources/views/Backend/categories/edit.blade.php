@extends('Backend.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('/admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{asset('/admin/categories')}}">Categories</a></li>
        <li class="breadcrumb-item active">Edit category</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    {{--<i class="fas fa-table"></i>--}}
                    Edit category
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/categories/'.$id,'method' => 'PUT', 'files' => 'true']) !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach($category->translations as $translation)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name on {{\App\Languages::languageName($translation->lang)}}</label>
                            <input name="name[{{$translation->lang}}]" class="form-control" id="name" value="{{$translation->name}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description on {{\App\Languages::languageName($translation->lang)}}</label>
                            <textarea name="description[{{$translation->lang}}]" class="form-control" id="name">{{$translation->description}}</textarea>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <small style="color: red">(if you don't want to change this image, don't click on it)</small>
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