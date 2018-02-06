@extends('layouts.frontend')

@section('body-content')
    <!-- about wrapper -->
    <div style="padding-top:3%;"></div>
    <div class="about-page-wrapper">
        <div class="description container">
            <div class="row ">

                <div class="col-xs-12">
                    <ul class="nav nav-pills nav-justified thumbnail custom-color">
                        <li><a href="#">
                                <p class="list-group-item-text">Email Verification</p>
                            </a></li>
                        <li><a href="#">
                                <p class="list-group-item-text">Phone Verification</p>
                            </a></li>
                        <li class="active"><a href="#">
                                <p class="list-group-item-text">Photo Upload</p>
                            </a></li>
                    </ul>
                </div>

                <div class="col-md-12 ">
                    <div class="about-right-text">
                        <div class="widget-title">
                            <h4>Sukses mengunggah foto</h4>
                            <p>Mohon menunggu untuk melanjutkan verifikasi Anda dengan klik link di bawah ini!</p>
                            <a href="{{route('verify-signature-photo')}}" class="btn btn-big btn-solid">Unggah Foto Signature</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
    </div>
@endsection