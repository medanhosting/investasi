@extends('layouts.frontend')

@section('body-content')
    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Portfolio Detail</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Home</a>
                        <i class="fa fa-angle-double-right"></i><a href="{{route('portfolio')}}">Portfolio</a>
                        <i class="fa fa-angle-double-right"></i>Detail
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <!-- Causes Wrapper -->
    <div class="causes-page-wrapper single-cause">
        <div class="container">
            <div class="row cause">
                <div class="col-md-10 col-md-offset-1">
                    <div class="image-wrapper">
                        <img class="img-responsive" src="assets/img/causes/single-cause.jpg" alt="">
                    </div>
                    <div class="meta">
                        <h2>This is Project Name</h2>
                        <div class="short-stats clearfix">
                            <h5><i class="fa fa-heart-o"></i>xxx loot</h5>
                            <h5><i class="fa fa-clock-o"></i>Date</h5>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="foundings">
                            <div class="progress-bar-wrapper min">
                                <div class="progress-bar-outer">

                                    <p class="values"><span class="value one">Investment Amount: Rp 5.000.000</span>
                                        {{--/<span class="value two"> To go: $45222</span>--}}
                                    </p>
                                    {{--<div class="progress-bar-inner">--}}
                                        {{--<div class="progress-bar">--}}
                                            {{--<span data-percent="75"> <span class="pretng">75%</span> </span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <button data-toggle="modal" data-target="#withdrawModal" class="btn btn-big btn-solid "><i class="fa fa-archive"></i><span>Sell</span></button>
                    </div>
                    <div class="info-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid error, repellat, voluptatem at iste soluta veritatis aperiam, pariatur sunt odit, ad praesentium! Modi asperiores adipisci optio voluptatibus iste corporis, animi ducimus placeat tenetur reprehenderit impedit quam molestiae suscipit, eaque dignissimos eos quae omnis, quidem.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem odio quasi nobis et aliquam deleniti, facilis corrupti quas, debitis modi? Autem repellat dolorum ipsa delectus adipisci culpa, quaerat quisquam dignissimos nihil tempora iste rem. Cupiditate, odit dolor numquam est non eveniet, perspiciatis dolorem commodi delectus maxime excepturi velit quos inventore?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius doloribus consequatur ratione, assumenda ipsum, quos itaque inventore ducimus voluptate, quas aliquid commodi sint. Nihil aut dolorem sed temporibus! At, ea dignissimos. Magni id fuga quidem tempora doloremque eaque dicta quia assumenda, odit ullam voluptate modi soluta, corrupti eum possimus. Possimus nesciunt cumque, consequuntur, sint aspernatur illum molestias atque consectetur voluptates quibusdam perspiciatis voluptate ipsa nostrum.</p>

                    </div>
                    <div style="padding-bottom:10%;"></div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.partials._modal-withdraw')
@endsection