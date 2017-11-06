@extends('layouts.frontend')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Update Proyek</h4>
                        </div>
                        <form class="comment-form row altered" method="POST" action="#">
                            {{ csrf_field() }}

                            <div class="field col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                                <h4>Judul Artikel</h4>
                                <input type="text" name="title">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="margin-top: 0;" class="field col-sm-12 {{ $errors->has('category') ? ' has-error' : '' }}">
                                <h4>Kategori</h4>
                                <select id="category" name="category">
                                    <option value="-1">Pilih Kategori</option>

                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="field col-sm-12" {{ $errors->has('content') ? ' has-error' : '' }}>
                                <h4>Konten Berita</h4>
                                <input type="hidden" id="content" name="content">
                                <textarea name="text" class="summernote" id="contents" title="Contents"></textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="field col-sm-12">
                                <br/>
                                <button class="btn btn-big btn-solid" id="submit" disabled><i class="fa fa-paper-plane"></i><span>Submit</span></button>
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
