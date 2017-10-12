
<!-- Modal -->
<div class="modal fade" id="prospektusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="comment-form" method="POST" action="{{ route('get-prospectus') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dapatkan Prospektus</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="comment-form-wrapper contact-from clearfix">

                                <div class="field col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <h5>Nama</h5>
                                    <input type="text" name="name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <h5>Email</h5>
                                    <input type="email" name="email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12">
                                    <input type="hidden" value="{{$product->id}}" name="id">
                                    <br/>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-error" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-solid">Kirim Prospektus</button>
                </div>
            </form>
        </div>
    </div>
</div>