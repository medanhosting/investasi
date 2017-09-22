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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Store Data</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br />
                        <form id="store-address-option-form" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="/admin/option/address/save">
                            {{ csrf_field() }}

                            @if(count($errors))
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 alert alert-danger alert-dismissible fade in" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li> {{ $error }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Address <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="detail" name="detail" required="required" class="form-control col-md-7 col-xs-12" value="{{ $option->address }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Province <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="province" name="province" onchange="getCity()">
                                        <option value="-1">Select province</option>
                                        @foreach($provinces as $province)
                                            @if($province->id == $option->province_id)
                                                <option value="{{ $province->id }}" selected>{{ $province->name }}</option>
                                            @else
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="city-wrapper" class="form-group" style="display: {{ $option->city_id != null ? 'block':'none' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">City <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="city" name="city" onchange="getSubdistrict()">
                                        <option value="-1">Populating data please wait...</option>
                                        @if(!empty($option->city_id))
                                            @foreach($cities as $city)
                                                @if($city->id == $option->city_id)
                                                    <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                                @else
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div id="subdistrict-wrapper" class="form-group" style="display: {{ $option->subdistrict_id != null ? 'block':'none' }}">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Subdistrict <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="subdistrict" name="subdistrict" class="form-control">
                                        <option value="-1">Populating data please wait...</option>
                                        @if(!empty($option->city_id))
                                            @foreach($subdistricts as $subdistrict)
                                                @if($subdistrict->subdistrict_id == $option->subdistrict_id)
                                                    <option value="{{ $subdistrict->subdistrict_id }}" selected>{{ $subdistrict->subdistrict_name }}</option>
                                                @else
                                                    <option value="{{ $subdistrict->subdistrict_id }}">{{ $subdistrict->subdistrict_name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Postal Code <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="postal-code" name="postal-code" required="required" class="form-control col-md-7 col-xs-12" value="{{ $option->postal_code }}">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getCity(){
            var provId = $("#province option:selected").val();

            if(provId !== '-1'){
                $('#city-wrapper').hide();
                $('#subdistrict-wrapper').hide();
                $.get('/admin/option/city?province=' + provId, function (data) {
                    if(data.success == true) {
                        $('#city').html(data.html);
                        $('#city-wrapper').show();
                    }
                });
            }
        }

        function getSubdistrict(){
            var cityId = $("#city option:selected").val();

            if(cityId !== '-1'){
                $('#subdistrict-wrapper').hide();
                $.get('/admin/option/subdistrict?city=' + cityId, function (data) {
                    if(data.success == true) {
                        $('#subdistrict').html(data.html);
                        $('#subdistrict-wrapper').show();
                    }
                });
            }
        }
    </script>
@endsection