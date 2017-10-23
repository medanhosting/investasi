
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login / Register</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="comment-form-wrapper contact-from clearfix">
                            Anda Harus Login/Register Terlebih Dahulu
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Tutup</button>
                    <a href="{{ route('register') }}" ><button type="button" class="btn btn-solid">Register</button></a>
                    <a href="{{ route('login') }}" ><button type="button" class="btn btn-solid">Login</button></a>
                </div>
        </div>
    </div>
</div>