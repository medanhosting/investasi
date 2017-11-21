@extends('layouts.frontend-noheader')

@section('body-content')
    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="comment-form-wrapper contact-from clearfix">
                        <div class="widget-title ">
                            <h4>Berita Penting</h4>
                            <span style="color:red">Harap membaca berita berikut ini untuk melanjutkan aktifitas di investasi.me.</span>
                            <div class="x_panel">
                                <div class="x_content table-responsive">
                                    <table id="datatable-responsive-blog" class="table table-striped table-bordered dt-responsive nowrap" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal Terbit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php( $idx = 1 )
                                            @foreach($blogs as $blog)
                                                <tr>
                                                    <td>{{ $idx }}</td>
                                                    <td>
                                                        <a href="{{ route('blog', ['id' => $blog->id]) }}">
                                                            {{ $blog->title }}
                                                        </a>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('j M Y G:i:s') }}</td>
                                                </tr>
                                                @php( $idx++ )
                                            @endforeach
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
