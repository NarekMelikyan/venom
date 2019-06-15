@extends('Backend.app')

@section('content')


    <?php
        use Illuminate\Support\Facades\Input;
    ?>
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('/admin/dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item"><a href="{{asset('/admin/venom')}}">Venom</a></li>
        <li class="breadcrumb-item active">Create venom</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    {{--<i class="fas fa-table"></i>--}}
                    Create venom
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/venom','method' => 'POST', 'files' => 'true']) !!}
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
                        <label for="category">Select category</label>
                        <select name="category_id" class="form-control" id="category">
                            @foreach($categories as $key=> $category)
                                <option value="{{$category->id}}">{{$category->translation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="subcategory">Select category</label>
                        <select name="subcategory_id" class="form-control" id="subcategory">
                            @foreach($subcategories as $key=> $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->translation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="code">Product ID</label>
                        <input name="code" class="form-control" id="code" type="text" value="{{\Illuminate\Support\Facades\Input::old('code')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="purity">Purity</label>
                        <input name="purity" class="form-control" id="purity" type="text" value="{{\Illuminate\Support\Facades\Input::old('purity')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" class="form-control" id="price" type="text" value="{{\Illuminate\Support\Facades\Input::old('price')}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input name="image" class="form-control" id="image" type="file">
                    </div>
                </div>
            </div>

            <?php
            $count = 1;
            ?>
            <ul class="nav nav-tabs">
                @foreach($languages as $language)
                    @if($count == 1)
                        <li style="padding: 10px" class="active"><a data-toggle="tab"
                                                              href="#{{$language->name}}">{{$language->name}}</a></li>
                    @else
                        <li style="padding: 10px" class=""><a data-toggle="tab"
                                                              href="#{{$language->name}}">{{$language->name}}</a></li>
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">

                @foreach($languages as $language)
                    @if($count == 1)
                        <div id="{{$language->name}}" class="tab-pane fade in active show">
                            @else
                                <div id="{{$language->name}}" class="tab-pane fade ">
                                    @endif
                                    <?php $count++; ?>
                                    <h3>{{$language->name}}</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name{{$language->name}}">Name</label>
                                                <input name="name[{{$language->lang}}]" class="form-control"
                                                       id="name{{$language->name}}" type="text" value="{{Input::old('name.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="common_name{{$language->name}}">Common names</label>
                                                <input name="common_name[{{$language->lang}}]" class="form-control"
                                                       id="common_name{{$language->name}}" type="text" value="{{Input::old('common_name.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="origin{{$language->name}}">Origin</label>
                                                <input name="origin[{{$language->lang}}]" class="form-control"
                                                       id="origin{{$language->name}}" type="text" value="{{Input::old('origin.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form{{$language->name}}">Form</label>
                                                <input name="form[{{$language->lang}}]" class="form-control"
                                                       id="form{{$language->name}}" type="text" value="{{Input::old('form.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="class{{$language->name}}">Class</label>
                                                <input name="class[{{$language->lang}}]" class="form-control"
                                                       id="class{{$language->name}}" type="text" value="{{Input::old('class.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="order{{$language->name}}">Order</label>
                                                <input name="order[{{$language->lang}}]" class="form-control"
                                                       id="order{{$language->name}}" type="text" value="{{Input::old('order.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="suborder{{$language->name}}">Suborder</label>
                                                <input name="suborder[{{$language->lang}}]" class="form-control"
                                                       id="suborder{{$language->name}}" type="text" value="{{Input::old('suborder.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="family{{$language->name}}">Family</label>
                                                <input name="family[{{$language->lang}}]" class="form-control"
                                                       id="family{{$language->name}}" type="text" value="{{Input::old('family.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="subfamily{{$language->name}}">Subfamily</label>
                                                <input name="subfamily[{{$language->lang}}]" class="form-control"
                                                       id="subfamily{{$language->name}}" type="text" value="{{Input::old('subfamily.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="genus{{$language->name}}">Genus</label>
                                                <input name="genus[{{$language->lang}}]" class="form-control"
                                                       id="genus{{$language->name}}" type="text" value="{{Input::old('genus.'.$language->lang.'')}}">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                @endforeach
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

        <script>
            $(document).ready(function () {
                $('#category').change(function () {
                    var id = $(this).val();
                    console.log(id)
                    $.ajax({
                        type: 'get',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/admin/categories/' + id + '/get-subcategory',
                        success: function (data) {
                            $('#subcategory').html(data);
                        }
                    });
                })
            })
        </script>

@endsection