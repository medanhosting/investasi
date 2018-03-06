
<!-- Footer -->
<footer style="background: white; padding:0 !important;border-top: 5px solid #ff7a00;">
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
            <button class="btn btn-big btn-solid" data-toggle="modal" data-target="#contactUsPopup">Hubungi Kami</button>
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
        <a href="https://www.facebook.com/investasime-1033332290157898" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        &nbsp;&nbsp;&nbsp;
        <a href="https://twitter.com/investasime7771" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        &nbsp;&nbsp;&nbsp;
        <a href="https://www.instagram.com/investasime7777/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        &nbsp;&nbsp;&nbsp;
        <a href="https://www.youtube.com/channel/UCLV2VznCGF7XFSzjuKARzrQ" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
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
                    <img class="subscribe_popup_image" src="{{ URL::asset('frontend_images/homepage/submit-subscribe.png') }}">
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
@include('frontend.partials._modal-contact-us')

<script>
    var urlLink = '{{route('subscribeEmail')}}';
</script>