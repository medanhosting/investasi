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
                            <h2>Edit Slider Banner</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            {!! Form::open(array('action' => array('Admin\BannerController@update', $banner->id), 'method' => 'POST', 'role' => 'form', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'novalidate')) !!}
                            {{ csrf_field() }}

                            @if($errors->count() > 0)
                                <div class="item form-group">
                                    <div class="control-label col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="color: red;">
                                        @foreach($errors->all() as $error)
                                            {{ $error }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Slider Image <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::file('image', array('id' => 'image-edit', 'class' => 'file-loading', 'data-slider-image' => asset('storage'. $banner->image_path))) !!}
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Caption
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="caption" name="caption"  class="form-control col-md-7 col-xs-12" type="text" value="{{ $banner->caption }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Sub Caption
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="subcaption" name="subcaption" class="form-control col-md-7 col-xs-12" value="{{ $banner->sub_caption }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Link to Product
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        @if(!empty($banner->product_id))
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="no" id="prod-no-opt"> No
                                            </label>
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" value="yes" id="prod-yes-opt" checked> Yes
                                            </label>
                                        @else
                                            <label class="btn btn-default active">
                                                <input type="radio" name="options" value="no" id="prod-no-opt" checked> No
                                            </label>
                                            <label class="btn btn-default">
                                                <input type="radio" name="options" value="yes" id="prod-yes-opt"> Yes
                                            </label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if(!empty($banner->product_id))
                                <div id="product-select" class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Product
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="product" name="product" class="form-control" style="width: 100%">
                                            <option value="-1">Select a product</option>

                                            @foreach($products as $product)
                                                @if($banner->product_id == $product->id)
                                                    <option value="{{ $product->id }}" selected>{{ $product->name }}</option>
                                                @else
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            @else
                                <div id="product-select" class="item form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Choose Product
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="product" name="product" class="form-control" style="width: 100%">
                                            <option value="-1">Select a product</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            @endif

                            @if(!empty($banner->product_id))
                                <div id="banner-url-input" class="item form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">URL
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="url" name="url" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            @else
                                <div id="banner-url-input" class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">URL
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="url" name="url" class="form-control col-md-7 col-xs-12" required>
                                    </div>
                                </div>
                            @endif

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Status
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control col-md-7 col-xs-1">

                                        @if($banner->status_id == 1)
                                            <option value="1" selected>Publish</option>
                                            <option value="0">Unpublish</option>
                                        @else
                                            <option value="1">Publish</option>
                                            <option value="0" selected>Unpublish</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="{{ route('slider-banner-list') }}" class="btn btn-primary">Cancel</a>
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