@extends('layouts.admin')

@section('dashboard')

    <!-- sidebar -->
    @include('admin.partials._sidebar')
    <!-- sidebar -->

    <!-- top navigation -->
    @include('admin.partials._navigation')
    <!-- /top navigation -->

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Product</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            {!! Form::open(array('action' => array('Admin\ProductController@update', $product->id), 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'novalidate')) !!}

                            {!! csrf_field() !!}

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="name" class="form-control col-md-7 col-xs-12"  name="name" required="required" type="text" value="{{ $product->name }}">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="category" name="category" class="form-control col-md-7 col-xs-1">
                                        <option value="-1">Select category</option>
                                        @foreach($categories as $category)
                                            @if($category->id == $product->category_id)
                                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if ($errors->has('category'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('category') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Price <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 price-format">
                                    <input id="price" name="price" required class="form-control col-md-7 col-xs-12" value="{{ $product->getOriginal('price') }}">
                                </div>
                            </div>

                            @if ($errors->has('price'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('price') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Set Discount
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group" data-toggle="buttons">

                                        @if(!empty($product->discount))
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="none" id="disc-none-opt"> No Discount
                                            </label>
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" value="percent" id="disc-percent-opt" checked> Percentage
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="flat" id="disc-flat-opt"> Flat Amount
                                            </label>
                                        @elseif(!empty($product->discount_flat))
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="none" id="disc-none-opt" checked> No Discount
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="percent" id="disc-percent-opt"> Percentage
                                            </label>
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" value="flat" id="disc-flat-opt" checked> Flat Amount
                                            </label>
                                        @else
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" value="none" id="disc-none-opt" checked> No Discount
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="percent" id="disc-percent-opt"> Percentage
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="flat" id="disc-flat-opt"> Flat Amount
                                            </label>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            @if(!empty($product->discount))
                            <div id="disc-percent" class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Percentage
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="discount-percent" name="discount-percent" class="form-control col-md-7 col-xs-12" value="{{ $product->discount }}">
                                </div>
                            </div>

                            <div id="disc-flat" class="item form-group" style="display: none;">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Flat Amount
                                </label>
                                <div class="price-format col-md-6 col-sm-6 col-xs-12">
                                    <input id="discount-flat" name="discount-flat" class="form-control col-md-7 col-xs-12" value="{{ $product->getOriginal('discount_flat') }}">
                                </div>
                            </div>
                            @elseif(!empty($product->discount_flat))
                                <div id="disc-percent" class="item form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Percentage
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="discount-percent" name="discount-percent" class="form-control col-md-7 col-xs-12" value="{{ $product->discount }}">
                                    </div>
                                </div>

                                <div id="disc-flat" class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Flat Amount
                                    </label>
                                    <div class="price-format col-md-6 col-sm-6 col-xs-12">
                                        <input id="discount-flat" name="discount-flat" class="form-control col-md-7 col-xs-12" value="{{ $product->getOriginal('discount_flat') }}">
                                    </div>
                                </div>
                            @else
                                <div id="disc-percent" class="item form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Percentage
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="discount-percent" name="discount-percent" class="form-control col-md-7 col-xs-12" value="{{ $product->discount }}">
                                    </div>
                                </div>

                                <div id="disc-flat" class="item form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount Flat Amount
                                    </label>
                                    <div class="price-format col-md-6 col-sm-6 col-xs-12">
                                        <input id="discount-flat" name="discount-flat" class="form-control col-md-7 col-xs-12" value="{{ $product->getOriginal('discount_flat') }}">
                                    </div>
                                </div>
                            @endif

                            @if ($errors->has('discount-percent'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount-percent') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($errors->has('discount-flat'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('discount-flat') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Weight in Gram <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12 price-format">
                                    <input id="weight" name="weight" required class="form-control col-md-7 col-xs-12" value="{{ $product->getOriginal('weight') }}">
                                </div>
                            </div>

                            @if ($errors->has('weight'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('weight') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Stock
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="qty" name="qty" class="form-control col-md-7 col-xs-12" value="{{ $product->quantity }}">
                                </div>
                            </div>

                            @if ($errors->has('qty'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('qty') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top: 0;">Featured Photo<br/>
                                    <span style="color: red;">recommended image ratio 3:4 or exact 270x370 pixel</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    {!! Form::file('product-featured', array('id' => 'product-featured', 'class' => 'file-loading', 'data-image-featured-path' => asset('storage/product/'. $imgFeatured))) !!}
                                </div>
                            </div>

                            @if ($errors->has('product-featured'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('product-featured') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(!$imgPhotos->isEmpty())
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" style="padding-top: 0;">Current Photos<br/>
                                        <span style="color: red;">recommended image ratio 3:4 or exact 270x370 pixel</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="cover-container">

                                            @foreach($imgPhotos as $photo)
                                                <div class="cover-item" id="{{ $photo->id. '_img' }}">
                                                    <div class="cover-image" style="background-image: url('{{ asset('storage/product/'. $photo->path) }}')">
                                                        <div class="cover-btn-group">
                                                            <div id="{{ $photo->id. '_btn_toggle' }}" class="btn btn-danger btn-cover-toggle" style="margin:0 auto;" onclick="makeFeatured('{{ $photo->id }}')">Make Featured</div><br/>
                                                            <div id="{{ $photo->id. '_btn_delete' }}" class="btn btn-danger btn-cover-delete" style="margin:0 auto;" onclick="deleteImageEdit('{{ $photo->id }}')" data-disabled="false")>Delete</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Add New Photos
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::file('product-photos[]', array('id' => 'product-photos', 'class' => 'file-loading', 'multiple' )) !!}
                                </div>
                            </div>

                            @if ($errors->has('product-photos'))
                                <div class="form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="alert alert-danger">
                                            {{ $errors->first('product-photos') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control col-md-7 col-xs-1">

                                        @if($product->status_id == 1)
                                            <option value="1" selected>Publish</option>
                                            <option value="0">Unpublish</option>
                                        @else
                                            <option value="1">Publish</option>
                                            <option value="0" selected>Unpublish</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea rows="5" id="description" name="description" class="form-control col-md-7 col-xs-12" style="resize: vertical;">{{ $product->description }}</textarea>
                                </div>
                            </div>

                            {{ Form::hidden('deleted_img_id', '', array('id' => 'deleted_img_id')) }}
                            {{ Form::hidden('img_featured_changed', '', array('id' => 'img_featured_changed')) }}
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ route('product-list') }}" class="btn btn-primary">Cancel</a>
                                    <button id="send" type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page content -->

    <!-- footer content -->
    @include('admin.partials._footer')
    <!-- footer content -->

@endsection