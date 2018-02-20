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
                            <h2>Daftar Request Vendor</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form class="comment-form row altered" id="owner-form" method="POST" enctype="multipart/form-data" action="{{route('vendor-request-submit')}}">
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

                                        <ul class="nav nav-pills nav-justified thumbnail custom-color" style="height:auto!important;">
                                            <li class="active"><a href="#project" data-toggle="tab">
                                                    <h4 class="list-group-item-heading"><b>Data Proyek</b></h4>
                                                </a></li>
                                            <li><a href="#owner" data-toggle="tab">
                                                    <h4 class="list-group-item-heading"><b>Perusahaan/Usaha</b></h4>
                                                </a></li>
                                            <li><a href="#user" data-toggle="tab">
                                                    <h4 class="list-group-item-heading"><b>Data Diri</b></h4>
                                                </a></li>
                                            <li><a href="#sosmed" data-toggle="tab">
                                                    <h4 class="list-group-item-heading"><b>Akun Media Sosial</b></h4>
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

                                            <div class="tab-pane" id="user">
                                                <div class="field col-sm-12">
                                                    <h4>E-mail</h4>
                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nomor Handphone</h4>
                                                    <input type="number" name="phone" value="{{old('phone')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nama seusai KTP</h4>
                                                    <input type="text" name="name" value="{{old('name')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Tanggal Lahir sesuai KTP</h4>
                                                    <input type="text" name="dob" value="{{old('dob')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat Rumah seusai KTP</h4>
                                                    <input type="text" name="address_ktp" value="{{old('address_ktp')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Status Pernikahan</h4>
                                                    <input type="text" name="marital_status" value="{{old('marital_status')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Pendidikan Terakhir</h4>
                                                    <input type="text" name="education" value="{{old('education')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div style="margin-top: 0;" class="field col-sm-12">
                                                    <h4>Username</h4>
                                                    <input type="text" name="username" value="{{old('username')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Password</h4>
                                                    <input type="password" name="password" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Konfirmasi Password</h4>
                                                    <input type="password" name="password_confirmation" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="sosmed">
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun facebook *</h4>
                                                    <input type="text" name="fb_acc" value="{{old('fb_acc')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun Instagram *</h4>
                                                    <input type="text" name="ig_acc" value="{{old('ig_acc')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div style="margin-top: 0;" class="field col-sm-12">
                                                    <h4>Alamat akun Twitter *</h4>
                                                    <input type="text" name="twitter_acc" value="{{old('twitter_acc')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun facebook usaha</h4>
                                                    <input type="text" name="vendor_fb" value="{{old('vendor_fb')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun Instagram usaha</h4>
                                                    <input type="text" name="vendor_ig" value="{{old('vendor_ig')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun Twitter usaha</h4>
                                                    <input type="text" name="vendor_tw" value="{{old('vendor_tw')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat akun Youtube usaha</h4>
                                                    <input type="text" name="vendor_yt" value="{{old('vendor_yt')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="tab-pane active" id="project">
                                                <div class="field col-sm-12">
                                                    <h4>Gambar Proyek / Produk</h4>
                                                    {!! Form::file('project_image', array('id' => 'photo', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Link Video Youtube</h4>
                                                    <input type="text" name="youtube" value="{{old('youtube')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nama Proyek / Produk</h4>
                                                    <input type="text" name="project_name" value="{{old('project_name')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div style="margin-top: 0;" class="field col-sm-12">
                                                    <h4>Tagline Proyek / Produk</h4>
                                                    <input type="text" name="project_tagline" value="{{old('project_tagline')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Deskripsi Proyek / Produk</h4>
                                                    <input type="hidden" id="description" name="description" value="{{old('description')}}">
                                                    <textarea class="summernote" id="description_text" value="{{old('description')}}" title="description"></textarea>
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
                                                    <input type="number" name="raising" value="{{old('raising')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Durasi Pendanaan</h4>
                                                    <input type="number" name="days_left" value="{{old('days_left')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>


                                            <div class="tab-pane" id="owner">
                                                <div class="field col-sm-12">
                                                    <h4>Gambar Profil</h4>
                                                    {!! Form::file('vendor_image', array('id' => 'photo_profile', 'class' => 'file')) !!}
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Tipe Perusahaan * </h4>
                                                    <select id="vendor_type" name="vendor_type" class="form-control">
                                                        <option value="-1">Pilih</option>
                                                        <option value="pt">Perseroan Terbatas (PT)</option>
                                                        <option value="cv">CV</option>
                                                        <option value="individual">Perseorangan</option>
                                                    </select>
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nama Perusahaan * </h4>
                                                    <input type="text" name="name_vendor" value="{{old('name_vendor')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Merk / Nama Dagang * </h4>
                                                    <input type="text" name="brand" value="{{old('brand')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Tipe Usaha * </h4>
                                                    <select id="business_type" name="business_type" class="form-control">
                                                        <option value="-1">Pilih</option>
                                                        <option value="manufaktur">Manufaktur</option>
                                                        <option value="jasa">Jasa</option>
                                                        <option value="perdagangan">Perdagangan</option>
                                                    </select>
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Lama Usaha Berdiri * </h4>
                                                    <input type="text" name="establish_since" value="{{old('establish_since')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Lama Usaha (Bulan)</h4>
                                                    <input type="text" name="establish_since_month" value="{{old('establish_since_month')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Besar Kepemilikan Saham Anda (%) * </h4>
                                                    <input type="text" name="ownership" value="{{old('ownership')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12 ">
                                                    <h4>Biografi * </h4>
                                                    <input type="hidden" id="description_vendor" name="description_vendor" value="{{old('description_vendor')}}">
                                                    <textarea class="summernote" id="description_vendor_text" value="{{old('description_vendor')}}" title="description_vendor"></textarea>
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat Kantor * </h4>
                                                    <input type="text" name="address"value="{{old('address')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Kode Pos * </h4>
                                                    <input type="text" name="postal_code"value="{{old('postal_code')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Kota * </h4>
                                                    <input type="text" name="city"value="{{old('city')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Provinsi * </h4>
                                                    <input type="text" name="province"value="{{old('province')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nomor Telepon Kantor * </h4>
                                                    <input type="text" name="phone_office"value="{{old('phone_office')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Alamat Website</h4>
                                                    <input type="text" name="website" value="{{old('website')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Rata-rata penjualan per bulan *</h4>
                                                    <input type="number" name="monthly_income" value="{{old('monthly_income')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Rata-rata keuntungan  per bulan *</h4>
                                                    <input type="number" name="monthly_profit" value="{{old('monthly_profit')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="bank">
                                                <div class="field col-sm-12">
                                                    <h4>Bank Rekening Perusahaan</h4>
                                                    <input type="text" name="bank"value="{{old('bank')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Nomor Rekening Perusahaan</h4>
                                                    <input type="text" name="no_rek"value="{{old('no_rek')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <h4>Akun Bank</h4>
                                                    <input type="text" name="acc_bank"value="{{old('acc_bank')}}" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <div class="field col-sm-12">
                                                    <br>
                                                    <button class="btn btn-success" onclick="formsubmit()"><i class="fa fa-paper-plane"></i><span>Submit</span></button>
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
    </div>
    <!-- page content -->

    <!-- footer content -->
    @include('admin.partials._footer')
    <!-- footer content -->

    <script type="text/javascript">
        function formsubmit(){

            var content = $('#description_text').val();
            var replaceContent = content.replace("\n", "<br/>");
            $('#description').val(replaceContent);
//            alert(replaceContent);
            var contentVendor = $('#description_vendor_text').val();
            var replaceContentVendor = contentVendor.replace("\n", "<br/>");
            $('#description_vendor').val(replaceContentVendor);
//            alert(replaceContentVendor);

//            $('#owner-form').submit();
        }

    </script>
@endsection