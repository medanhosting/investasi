@if(\Illuminate\Support\Facades\Session::has('message'))
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{ \Illuminate\Support\Facades\Session::get('message') }}</strong>
    </div>
@endif
@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{ \Illuminate\Support\Facades\Session::get('error') }}</strong>
    </div>
@endif