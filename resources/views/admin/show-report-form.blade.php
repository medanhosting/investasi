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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Select filter</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form data-parsley-validate class="form-horizontal form-label-left" method="POST" action="/admin/report">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label for="description">Start Date <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <input type="text" name="start_date" required="required" class="form-control">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="control-label col-md-3 col-sm-3 col-xs-12">
                                    <label for="description">Finish Date <span class="required">*</span></label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <input type="text" name="finish_date" required="required" class="form-control">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                    </div>
                                </div>
                            </div>

                            @if(count($errors))
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 alert alert-danger alert-dismissible fade in" role="alert">
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

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Status
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default active">
                                            <input type="radio" name="options" value="10" id="prod-no-opt" checked> Success
                                        </label>
                                        <label class="btn btn-default">
                                            <input type="radio" name="options" value="9" id="prod-yes-opt"> Failed
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <p class="red">Master data once created cannot be deleted!</p>
                                    <button type="submit" class="btn btn-success">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <!-- footer -->
    @include('admin.partials._footer')
    <!-- /footer -->

@endsection

<script type="text/javascript">

    function InvoicePrint() {
        window.print();
    }
</script>