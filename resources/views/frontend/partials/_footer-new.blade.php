
<!-- Footer -->
<footer style="background: white; padding:0 !important;">

    <!-- Subscribe -->
    <div class="subscribe-form-div">
        <div class="section-name one  subscribe-section">
            <div class="subcribe widget clearfix">
                <h2>Dapatkan Berita & Informasi Terbaru ke Email Anda</h2>
                {!! Form::open(['url'=>'subscribeEmail','id'=>'subscribe-form'])!!}
                    <div class="col-md-offset-2 col-md-3 col-sm-12 field">
                        <input style="margin-bottom: 5%;" type="text" name="name" id="name" class="subscribe-field" placeholder="Ketikkan nama Anda disini">
                    </div>
                    <div class="col-md-3 col-sm-12 field">
                        <input style="margin-bottom: 5%;" type="email" name="email" id="email" class="subscribe-field" placeholder="Ketikkan alamat E-mail Anda disini">
                    </div>
                    <div class="col-md-3 col-sm-12 field">
                        {!! Form::submit('Kirim',['class'=>'btn btn-min btn-solid subscribe-submit'])!!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        &nbsp;
    </div>
    <div class="container subscribe-footer">
        <div class="col-md-12" style="padding-top: 3%;padding-bottom: 3%;">
            <img src="{{ URL::asset('frontend_images/logo.png') }}" style="width:250px">
            {{--<br>--}}
            {{--<br>--}}
            {{--<h2>Terdaftar dan diawasi oleh</h2>--}}
            {{--<br>--}}
            {{--<img src="{{ URL::asset('frontend_images/homepage/ojk.png') }}" style="width:250px">--}}
            {{--<br>--}}
        </div>

        <div class="col-md-6 col-sm-12 homepage-footer-contact-us">
            <button class="btn btn-big btn-solid" >Hubungi Kami</button>
        </div>
        <div class="col-md-6 col-sm-12" style="text-align: left;">
            PT BURSA AKSELERASI INDONESIA
            <br>
            Menara Satrio Lantai 14 unit 5
            <br>
            Jalan Prof. DR. Satrio Kav. 1-4 Blok C4
            <br>
            Kel. Kuningan Timur, Kec. Setiabudi, Jakarta Selatan 12950, Indonesia
            <br>
            Telepon (021)25981342
        </div>
    </div>
    <div class="footer-bar" style="background: white; color: #ff7a00;margin-top: 0;font-size: 16px !important;">
        <i class="fa fa-facebook" aria-hidden="true"></i>
        &nbsp;&nbsp;&nbsp;
        <i class="fa fa-twitter" aria-hidden="true"></i>
        &nbsp;&nbsp;&nbsp;
        <i class="fa fa-google-plus" aria-hidden="true"></i>
        &nbsp;&nbsp;&nbsp;
        <i class="fa fa-linkedin" aria-hidden="true"></i>
        <br><br>
        <div class="container">
            <h5>2018 © All Rights Reserved | Privacy Policy</h5>
        </div>
    </div>

    <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top: 10%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{--<h4 class="modal-title" id="myModalLabel">Success</h4>--}}
                </div>
                <div class="modal-body text-center">
                    <img src="{{ URL::asset('frontend_images/homepage/submit-subscribe.png') }}">
                    <br><br>
                    Kami telah mendaftarkan email Anda paga sistem kami.
                    <br><br>
                    Cek email Anda sekarang dan lakukan konfirmasi alamat email Anda.
                    <br><br>
                    Apabila Anda tidak menemukan email tersebut silahkan cek pada spam folder Anda.
                    <br><br>
                    Bila Anda mendapatkan email apapun dari kami silahkan hubungi info@investasi.me
                    <br><br>
                    Terima kasih

                    {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    var urlLink = '{{route('subscribeEmail')}}';
</script>