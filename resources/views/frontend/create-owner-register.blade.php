@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md- col-md-offset-2">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Registrasi Proyek</h4>
                        </div>
                        <form class="comment-form row altered" method="POST" action="#">
                            {{ csrf_field() }}

                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#data" data-toggle="tab">Data Umum</a></li>
                                    <li><a href="#project" data-toggle="tab">Proyek</a></li>
                                    <li><a href="#user" data-toggle="tab">Data Diri</a></li>
                                    <li><a href="#owner" data-toggle="tab">Perusahaan/Usaha</a></li>
                                    <li><a href="#bank" data-toggle="tab">Akun Bank</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="data">
                                        <div class="field col-sm-12 {{ $errors->has('photo') ? ' has-error' : '' }}">
                                            <h4>Gambar Proyek</h4>
                                            {!! Form::file('verification-photo', array('id' => 'photo', 'class' => 'file')) !!}
                                            @if ($errors->has('photo'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('youtube') ? ' has-error' : '' }}">
                                            <h4>Link Video Youtube</h4>
                                            <input type="text" name="youtube">
                                            @if ($errors->has('youtube'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <h4>Nama Proyek</h4>
                                            <input type="text" name="name">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('tagline') ? ' has-error' : '' }}">
                                            <h4>Tagline Proyek</h4>
                                            <input type="text" name="tagline">
                                            @if ($errors->has('tagline'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('tagline') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('category') ? ' has-error' : '' }}">
                                            <h4>Kategori</h4>
                                            <select id="category" name="category" class="form-control">
                                                <option value="-1">Pilih Kategori</option>

                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('raising') ? ' has-error' : '' }}">
                                            <h4>Total Pendanaan</h4>
                                            <input type="number" name="raising">
                                            @if ($errors->has('raising'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('raising') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12" {{ $errors->has('days_left') ? ' has-error' : '' }}>
                                            <h4>Durasi Pendanaan</h4>
                                            <input type="number" name="days_left">
                                            @if ($errors->has('days_left'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('days_left') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="project">
                                        <div class="field col-sm-12" {{ $errors->has('description') ? ' has-error' : '' }}>
                                            <h4>Deskripsi Proyek</h4>
                                            <input type="hidden" id="description" name="description">
                                            <textarea name="text" class="summernote" id="description" title="description"></textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="user">
                                        <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <h4>E-mail</h4>
                                            <input type="email" name="email">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <h4>Nama Depan</h4>
                                            <input type="text" name="first_name">
                                            @if ($errors->has('first_name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                            <h4>Nama Belakang</h4>
                                            <input type="text" name="last_name">
                                            @if ($errors->has('last_name'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <h4>Username</h4>
                                            <input type="text" name="username">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <h4>Nomor Handphone</h4>
                                            <input type="number" name="phone">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12" {{ $errors->has('password') ? ' has-error' : '' }}>
                                            <h4>Password</h4>
                                            <input type="password" name="password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12" {{ $errors->has('password_confirmation') ? ' has-error' : '' }}>
                                            <h4>Konfirmasi Password</h4>
                                            <input type="password" name="password_confirmation">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="owner">
                                        <div class="field col-sm-12 {{ $errors->has('photo_profile') ? ' has-error' : '' }}">
                                            <h4>Gambar Profil</h4>
                                            {!! Form::file('verification-photo', array('id' => 'photo_profile', 'class' => 'file')) !!}
                                            @if ($errors->has('photo_profile'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('photo_profile') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('name_vendor') ? ' has-error' : '' }}">
                                            <h4>Nama Perusahaan</h4>
                                            <input type="text" name="name_vendor">
                                            @if ($errors->has('name_vendor'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name_vendor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('description_vendor') ? ' has-error' : '' }}">
                                            <h4>Biografi</h4>
                                            <input type="hidden" id="description_vendor" name="description_vendor">
                                            <textarea name="text" class="summernote" id="description_vendor" title="description_vendor"></textarea>
                                            @if ($errors->has('description_vendor'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('description_vendor') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('address') ? ' has-error' : '' }}">
                                            <h4>Alamat Perusahaan</h4>
                                            <input type="text" name="address">
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="bank">
                                        <div class="field col-sm-12 {{ $errors->has('no_rek') ? ' has-error' : '' }}">
                                            <h4>Bank Rekening Perusahaan</h4>
                                            <input type="text" name="no_rek">
                                            @if ($errors->has('no_rek'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('no_rek') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('no_rek') ? ' has-error' : '' }}">
                                            <h4>Nomor Rekening Perusahaan</h4>
                                            <input type="text" name="no_rek">
                                            @if ($errors->has('no_rek'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('no_rek') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="field col-sm-12 {{ $errors->has('acc_bank') ? ' has-error' : '' }}">
                                            <h4>Akun Bank</h4>
                                            <span style="color:red;font-size:14px;">Nomor rekening untuk penarikan harus sama dengan nama perusahaan</span>
                                            <input type="text" name="acc_bank">
                                            @if ($errors->has('acc_bank'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('acc_bank') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field col-sm-12">
                                <br/>
                                <button class="btn btn-big btn-solid" id="submit"><i class="fa fa-paper-plane"></i><span>Register</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function check(){

            if(document.getElementById("check1").checked){
                document.getElementById("submit").disabled = false;
            }
            else if(document.getElementById("check1").checked == false){
                document.getElementById("submit").disabled = true;
            }
        }
    </script>
@endsection
