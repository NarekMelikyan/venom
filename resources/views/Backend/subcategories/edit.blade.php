@extends('Backend.app')

@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('/admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{asset('/admin/subcategories')}}">Subcategories</a></li>
        <li class="breadcrumb-item active">Create subcategory</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    {{--<i class="fas fa-table"></i>--}}
                    Create subcategory
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/subcategories/'.$id,'method' => 'Put']) !!}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="category_id">Select category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $item)
                                @if($item->id == $subcategory->category_id)
                                    <option value="{{$item->id}}" selected>{{$item->translation->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->translation->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @foreach($subcategory->translations as $translation)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name on {{\App\Languages::languageName($translation->lang)}}</label>
                            <input name="name[{{$translation->lang}}]" class="form-control" id="name"
                                   value="{{$translation->name}}">
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="row">
                <div class="col-md-12" style="text-align: right">
                    <a href="{{asset('/admin/subcategories')}}" class="btn btn-danger btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection