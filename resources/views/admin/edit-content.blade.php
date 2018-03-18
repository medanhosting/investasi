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
                        <div id="title-header" class="x_title">
                            <h2>Edit Konten</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <div class="field col-sm-12">
                                @if(count($errors))
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12 alert alert-danger alert-dismissible fade in" role="alert">
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

                                <div class="panel-heading">

                                    <ul class="nav nav-pills nav-justified thumbnail custom-color" style="height:auto!important;">
                                        <li class="active"><a href="#home_1" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Home section 1</b></h4>
                                            </a></li>
                                        <li><a href="#home_2" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Home section 2</b></h4>
                                            </a></li>
                                        <li><a href="#home_3" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Home section 3</b></h4>
                                            </a></li>
                                        <li><a href="#home_4" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Home section 4</b></h4>
                                            </a></li>
                                        <li><a href="#home_popup" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Home popup</b></h4>
                                            </a></li>
                                    </ul>
                                    {{--<ul class="nav nav-tabs">--}}
                                    {{--<li class="active"><a href="#project" data-toggle="tab">Data Proyek</a></li>--}}
                                    {{--<li><a href="#user" data-toggle="tab">Data Diri</a></li>--}}
                                    {{--<li><a href="#owner" data-toggle="tab">Perusahaan/Usaha</a></li>--}}
                                    {{--<li><a href="#bank" data-toggle="tab">Akun Bank</a></li>--}}
                                    {{--</ul>--}}
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">

                                        {{--home_1--}}
                                        <div class="tab-pane active" id="home_1">
                                            <div class="field col-sm-12" style="padding-bottom: 3%;">
                                                <h2>Contoh Hasil Jadi</h2>
                                                <img src="{{ URL::asset('admin_images/content/ss1.png') }}" style="width: 100%;">
                                            </div>
                                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('content-edit-submit', ['id'=>'home_1'])}}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12">
                                                    <h4>A. Gambar Background (rekomendasi = format .jpg, ukuran 1440 x 729)</h4>
                                                    <img src="{{ URL::asset('frontend_images/homepage/'.$content_1->image_path) }}" style="width: 30%;">
                                                    {!! Form::file('background_image', array('id' => 'background_image', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>B. Konten 1 (rekomendasi = 1 kalimat maksimal 3-4 kata)</h4>
                                                    <input type="text" name="content_1" value="{{$content_1->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>C. Konten 2 </h4>
                                                    <textarea id="content_2" name="content_2" title="konten 2" style="width:100%;">{{$content_1->content_2}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>D. Konten 3 (rekomendasi = 1 kalimat maksimal 3 kata)</h4>
                                                    <input type="text" name="content_3" value="{{$content_1->content_3}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>D. Link Pada Konten 3</h4>
                                                    <input type="text" name="link" value="{{$content_1->link}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>

                                        {{--home_2--}}
                                        <div class="tab-pane" id="home_2">
                                            <div class="field col-sm-12" style="padding-bottom: 3%;">
                                                <h2>Contoh Hasil Jadi</h2>
                                                <img src="{{ URL::asset('admin_images/content/ss2.png') }}" style="width: 100%;">
                                            </div>
                                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('content-edit-submit', ['id'=>'home_2'])}}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12">
                                                    <h4>A. Gambar Background (rekomendasi = format .jpg, ukuran 1440 x 729, dengan gambar 50% berada disebelah kiri )</h4>
                                                    <img src="{{ URL::asset('frontend_images/homepage/'.$content_2->image_path) }}" style="width: 30%;">
                                                    {!! Form::file('background_image', array('id' => 'background_image', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>B. Konten 1 (rekomendasi = 1 kalimat maksimal 4-5 kata)</h4>
                                                    <input type="text" name="content_1" value="{{$content_2->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>C. Konten 2 </h4>
                                                    <textarea id="content_2" name="content_2" title="konten 2" style="width:100%;">{{$content_2->content_2}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>D. Konten 3 </h4>
                                                    <textarea id="content_3" name="content_3" title="konten 3" style="width:100%;">{{$content_2->content_3}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>E. Konten 4 (rekomendasi = 1 kalimat maksimal 3 kata)</h4>
                                                    <input type="text" name="content_4" value="{{$content_2->content_4}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>E. Link Pada Konten 4</h4>
                                                    <input type="text" name="link" value="{{$content_2->link}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>

                                        {{--home_3--}}
                                        <div class="tab-pane" id="home_3">
                                            <div class="field col-sm-12" style="padding-bottom: 3%;">
                                                <h2>Contoh Hasil Jadi</h2>
                                                <img src="{{ URL::asset('admin_images/content/ss3.png') }}" style="width: 100%;">
                                            </div>
                                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('content-edit-submit', ['id'=>'home_3'])}}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12">
                                                    <h4>A. Gambar Background (rekomendasi = format .jpg, ukuran 1440 x 729, dengan gambar berada disebelah kanan)</h4>
                                                    <img src="{{ URL::asset('frontend_images/homepage/'.$content_3->image_path) }}" style="width: 30%;">
                                                    {!! Form::file('background_image', array('id' => 'background_image', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>B. Konten 1 (rekomendasi = 1 kalimat maksimal 2 kata)</h4>
                                                    <input type="text" name="content_1" value="{{$content_3->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>C. Konten 2 (rekomendasi = 1 kalimat maksimal 3 kata)</h4>
                                                    <input type="text" name="content_2" value="{{$content_3->content_2}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>D. Konten 3 </h4>
                                                    <textarea id="content_3" name="content_3" title="konten 3" style="width:100%;">{{$content_3->content_3}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>E. Konten 4 </h4>
                                                    <textarea id="content_4" name="content_4" title="konten 4" style="width:100%;">{{$content_3->content_4}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>F. Konten 5 (rekomendasi = 1 kalimat maksimal 3 kata)</h4>
                                                    <input type="text" name="content_5" value="{{$content_3->content_5}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>F. Link Pada Konten 5</h4>
                                                    <input type="text" name="link" value="{{$content_3->link}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>

                                        {{--home_4--}}
                                        <div class="tab-pane" id="home_4">
                                            <div class="field col-sm-12" style="padding-bottom: 3%;">
                                                <h2>Contoh Hasil Jadi</h2>
                                                <img src="{{ URL::asset('admin_images/content/ss4.png') }}" style="width: 100%;">
                                            </div>
                                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('content-edit-submit', ['id'=>'home_4'])}}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12">
                                                    <h4>A. Gambar Background (rekomendasi = format .jpg, ukuran 1440 x 729)</h4>
                                                    <img src="{{ URL::asset('frontend_images/homepage/'.$content_4_1->image_path) }}" style="width: 30%;">
                                                    {!! Form::file('home_4_background_image', array('id' => 'background_image', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>B. Konten 1 (rekomendasi = 1 kalimat maksimal 4-5 kata)</h4>
                                                    <input type="text" name="content_1" value="{{$content_4_1->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>C. Konten 2 (rekomendasi = 1 kalimat maksimal 4-5 kata)</h4>
                                                    <input type="text" name="content_2" value="{{$content_4_1->content_2}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <br>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>D. Konten 3 (rekomendasi = 1 kalimat maksimal 2 kata)</h4>
                                                    <input type="text" name="content_3" value="{{$content_4_2->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>D1. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_1', array('id' => 'home_4_image_1', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>D2. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_2', array('id' => 'home_4_image_2', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>D3. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_3', array('id' => 'home_4_image_3', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <br>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>E. Konten 4 (rekomendasi = 1 kalimat maksimal 2 kata)</h4>
                                                    <input type="text" name="content_4" value="{{$content_4_3->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>E1. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_4', array('id' => 'home_4_image_4', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>E2. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_5', array('id' => 'home_4_image_5', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>E3. Gambar (rekomendasi = format .png, ukuran 185 x 196)</h4>
                                                    {!! Form::file('home_4_image_6', array('id' => 'home_4_image_6', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>

                                        {{--home_popup--}}
                                        <div class="tab-pane" id="home_popup">
                                            <div class="field col-sm-12" style="padding-bottom: 3%;">
                                                <h2>Contoh Hasil Jadi</h2>
                                                <img src="{{ URL::asset('admin_images/content/ss5.png') }}" style="width: 100%;">
                                            </div>
                                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('content-edit-submit', ['id'=>'home_popup'])}}">
                                                {{ csrf_field() }}

                                                <div class="field col-sm-12">
                                                    <h4>A. Konten 1 (rekomendasi = 1 kalimat maksimal 3-4 kata)</h4>
                                                    <input type="text" name="content_1" value="{{$content_popup->content_1}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>B. Konten 2 </h4>
                                                    <textarea id="content_2" name="content_2" title="konten 2" style="width:100%;">{{$content_popup->content_2}}</textarea>
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>C. Konten 3 (rekomendasi = 1 kalimat maksimal 3 kata)</h4>
                                                    <input type="text" name="content_3" value="{{$content_popup->content_3}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>C. Link Pada Konten 3</h4>
                                                    <input type="text" name="link" value="{{$content_popup->link}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
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

    <script type="text/javascript">
        function formsubmit(){
//
//            var content = $('#home_popup_content_2').val();
//            var replaceContent = content.replace("\n", "<br>");
//            $('#description').val(replaceContent);
//            alert(replaceContent);
//            var contentVendor = $('#description_vendor_text').val();
//            var replaceContentVendor = contentVendor.replace("\n", "<br>");
//            $('#description_vendor').val(replaceContentVendor);
//            alert(replaceContentVendor);

//            $('#owner-form').submit();
        }

    </script>
@endsection