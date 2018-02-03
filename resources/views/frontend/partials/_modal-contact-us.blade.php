
<!-- Modal -->
<div class="modal fade" id="contactUsPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">Login / Register</h4>--}}
                {{--</div>--}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="comment-form-wrapper contact-from clearfix">
                                <form class="comment-form row altered" method="POST" action="{{ route('login') }}">
                                    @if($errors->has('msg'))
                                        <div class="field col-sm-12 text-center">
                                            <span class="help-block" style="color: red;">{{$errors->first()}}</span>
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
                                        <div class="field col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}"style="margin-top: 30px;padding: 0 30px;">
                                            <h4>Nama</h4>
                                            <input type="text" name="name">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}" style="margin-top: 30px;padding: 0 30px;">
                                        <h4>Alamat E-mail</h4>
                                        <input type="email" name="email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="field col-sm-12 {{ $errors->has('phone') ? ' has-error' : '' }}" style="padding: 0 30px;">
                                        <h4>No Handphone</h4>
                                        <input type="number" name="phone">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="field col-sm-12 {{ $errors->has('question') ? ' has-error' : '' }}" style="margin-top: 30px;padding: 0 30px;">
                                        <h4>Pertanyaan</h4>
                                        <textarea>

                                        </textarea>
                                        @if ($errors->has('question'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                        <div class="field col-sm-12" style="text-align: center;margin-top: 30px;">
                                            <button class="btn btn-big btn-solid"><span>Kirim</span></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>