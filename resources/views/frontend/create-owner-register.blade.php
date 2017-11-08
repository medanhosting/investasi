@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Registrasi Proyek</h4>
                        </div>
                        <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('owner-request-submit')}}">
                            {{ csrf_field() }}

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

                                    <ul class="nav nav-pills nav-justified thumbnail custom-color">
                                        <li class="active"><a href="#project" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Data Proyek</b></h4>
                                            </a></li>
                                        <li><a href="#owner" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Perusahaan/Usaha</b></h4>
                                            </a></li>
                                        <li><a href="#user" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Data Diri</b></h4>
                                            </a></li>
                                        <li><a href="#bank" data-toggle="tab">
                                                <h4 class="list-group-item-heading"><b>Akun Bank</b></h4>
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
                                        <div class="tab-pane active" id="project">
                                            <div class="field col-sm-12">
                                                <h4>Gambar Proyek</h4>
                                                {!! Form::file('project_image', array('id' => 'photo', 'class' => 'file')) !!}
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Link Video Youtube</h4>
                                                <input type="text" name="youtube" value="{{old('youtube')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Nama Proyek</h4>
                                                <input type="text" name="project_name" value="{{old('project_name')}}">
                                            </div>
                                            <div style="margin-top: 0;" class="field col-sm-12">
                                                <h4>Tagline Proyek</h4>
                                                <input type="text" name="project_tagline" value="{{old('project_tagline')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Deskripsi Proyek</h4>
                                                <input type="hidden" id="description" name="description" value="{{old('description')}}">
                                                <textarea class="summernote" id="description_text" title="description"></textarea>
                                            </div>
                                            <div style="margin-top: 0;" class="field col-sm-12 ">
                                                <h4>Kategori</h4>
                                                <select id="category" name="category" class="form-control">
                                                    <option value="-1">Pilih Kategori</option>

                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Total Pendanaan</h4>
                                                <input type="number" name="raising" value="{{old('raising')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Durasi Pendanaan</h4>
                                                <input type="number" name="days_left" value="{{old('days_left')}}">
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="user">
                                            <div class="field col-sm-12">
                                                <h4>E-mail</h4>
                                                <input type="email" name="email" value="{{old('email')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Nama Depan</h4>
                                                <input type="text" name="first_name" value="{{old('first_name')}}">
                                            </div>
                                            <div style="margin-top: 0;" class="field col-sm-12">
                                                <h4>Nama Belakang</h4>
                                                <input type="text" name="last_name" value="{{old('last_name')}}">
                                            </div>
                                            <div style="margin-top: 0;" class="field col-sm-12">
                                                <h4>Username</h4>
                                                <input type="text" name="username" value="{{old('username')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Nomor Handphone</h4>
                                                <input type="number" name="phone" value="{{old('phone')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Password</h4>
                                                <input type="password" name="password">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Konfirmasi Password</h4>
                                                <input type="password" name="password_confirmation">
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="owner">
                                            <div class="field col-sm-12">
                                                <h4>Gambar Profil</h4>
                                                {!! Form::file('vendor_image', array('id' => 'photo_profile', 'class' => 'file')) !!}
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Nama Perusahaan</h4>
                                                <input type="text" name="name_vendor" value="{{old('name_vendor')}}">
                                            </div>
                                            <div class="field col-sm-12 ">
                                                <h4>Biografi</h4>
                                                <input type="hidden" id="description_vendor" name="description_vendor" value="{{old('description_vendor')}}">
                                                <textarea class="summernote" id="description_vendor_text" title="description_vendor"></textarea>
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Alamat Perusahaan</h4>
                                                <input type="text" name="address"value="{{old('address')}}">
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="bank">
                                            <div class="field col-sm-12">
                                                <h4>Bank Rekening Perusahaan</h4>
                                                <input type="text" name="bank"value="{{old('bank')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Nomor Rekening Perusahaan</h4>
                                                <input type="text" name="no_rek"value="{{old('no_rek')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <h4>Akun Bank</h4>
                                                <span style="color:red;font-size:14px;">Nomor rekening untuk penarikan harus sama dengan nama perusahaan</span>
                                                <input type="text" name="acc_bank"value="{{old('acc_bank')}}">
                                            </div>
                                            <div class="field col-sm-12">
                                                <button class="btn btn-big btn-solid" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function formsubmit(){

            var content = $('#description_text').val();
            var replaceContent = content.replace("\n", "<br/>");
            $('#description').val(replaceContent);
alert(replaceContent);
            var contentVendor = $('#description_vendor_text').val();
            var replaceContentVendor = contentVendor.replace("\n", "<br/>");
            $('#description_vendor').val(replaceContentVendor);
            alert(replaceContentVendor);

//            $('#owner-form').submit();
        }

    </script>
@endsection
