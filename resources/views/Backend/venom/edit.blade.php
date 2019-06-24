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
                    Edit venom
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url' => '/admin/venom/'.$id,'method' => 'PUT', 'files' => 'true']) !!}
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
                            {{--@foreach($subcategories as $key=> $subcategory)--}}
                            {{--<option value="{{$subcategory->id}}">{{$subcategory->translation->name}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="code">Product ID</label>
                        <input name="code" class="form-control" id="code" type="text" value="{{$venom->code}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="purity">Purity</label>
                        <input name="purity" class="form-control" id="purity" type="text" value="{{$venom->purity}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" class="form-control" id="price" type="text" value="{{$venom->price}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <img src="{{asset($venom->image)}}">
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
                                                                    href="#{{$language->lang}}">{{$language->name}}</a>
                        </li>
                    @else
                        <li style="padding: 10px" class=""><a data-toggle="tab"
                                                              href="#{{$language->lang}}">{{$language->name}}</a></li>
                    @endif
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($venom->translations as $item)
                    @if($count == 1)
                        <div id="{{$item->lang}}" class="tab-pane fade in active show">
                            @else
                                <div id="{{$item->lang}}" class="tab-pane fade ">
                                    @endif
                                    <?php $count++; ?>
                                    <h3>{{$item->lang}}</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="name{{$item->lang}}">Name</label>
                                                <input name="name[{{$item->lang}}]" class="form-control"
                                                       id="name{{$item->lang}}" type="text" value="{{$item->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="common_name{{$item->lang}}">Common names</label>
                                                <input name="common_name[{{$item->lang}}]" class="form-control"
                                                       id="common_name{{$item->lang}}" type="text"
                                                       value="{{$item->common_names}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="origin{{$item->lang}}">Origin</label>
                                                <input name="origin[{{$item->lang}}]" class="form-control"
                                                       id="origin{{$item->lang}}" type="text" value="{{$item->origin}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form{{$item->lang}}">Form</label>
                                                <input name="form[{{$item->lang}}]" class="form-control"
                                                       id="form{{$item->lang}}" type="text" value="{{$item->form}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="class{{$item->lang}}">Class</label>
                                                <input name="class[{{$item->lang}}]" class="form-control"
                                                       id="class{{$item->lang}}" type="text" value="{{$item->class}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="order{{$item->lang}}">Order</label>
                                                <input name="order[{{$item->lang}}]" class="form-control"
                                                       id="order{{$item->lang}}" type="text" value="{{$item->order}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="suborder{{$item->lang}}">Suborder</label>
                                                <input name="suborder[{{$item->lang}}]" class="form-control"
                                                       id="suborder{{$item->lang}}" type="text"
                                                       value="{{$item->suborder}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="family{{$item->lang}}">Family</label>
                                                <input name="family[{{$item->lang}}]" class="form-control"
                                                       id="family{{$item->lang}}" type="text" value="{{$item->family}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="subfamily{{$item->lang}}">Subfamily</label>
                                                <input name="subfamily[{{$item->lang}}]" class="form-control"
                                                       id="subfamily{{$item->lang}}" type="text"
                                                       value="{{$item->subfamily}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="genus{{$item->lang}}">Genus</label>
                                                <input name="genus[{{$item->lang}}]" class="form-control"
                                                       id="genus{{$item->lang}}" type="text" value="{{$item->genus}}">
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