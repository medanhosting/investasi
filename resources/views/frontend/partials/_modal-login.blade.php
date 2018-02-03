
<!-- Modal -->
<div class="modal fade" id="loginModalPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="padding-top:10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                {{--<h4 class="modal-title" id="myModalLabel">Login / Register</h4>--}}
                {{--</div>--}}
                <div class="modal-body">
                    <div class="row">
                        <div class="clearfix" style="padding:5%;text-align: center;color: blue;">
                            <form class="altered" method="POST" action="{{ route('login') }}">
                                @if($errors->has('msg'))
                                    <div class="field col-sm-12 text-center">
                                        <span class="help-block" style="color: red;">{{$errors->first()}}</span>
                                    </div>
                                @endif
                                {{ csrf_field() }}
                                <div class="field col-sm-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input class="custom-input-login" type="email" name="email" placeholder="Email" >
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12" {{ $errors->has('password') ? ' has-error' : '' }}>
                                    <input class="custom-input-login" type="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="field col-sm-12" style="padding-top:5%">
                                    <h4>Tidak mempunyai Akun? Klik disini untuk <a href="{{ route('register') }}" style="color: #ff7a00;">Register</a></h4>
                                </div>
                                <div class="col-sm-12">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                                <div class="col-sm-12">
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #ff7a00;">
                                        Forgot Your Password?
                                    </a>
                                    <br>
                                    <button class="btn btn-big btn-solid"><i class="fa fa-paper-plane"></i><span>Login</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>