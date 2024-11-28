@extends('layouts.app')

@section('title', 'Article')

@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                    <img src="{{asset('assets/img/upload/example.png')}}" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="{{ route('tech-category', ['id' => 1]) }}" title="">Technology</a></span>
                                <h4><a href="{{ route('tech-single1', ['id' => 1]) }}" title="">Kenali 5 Penyebab Hardisk Penuh dengan Tepat</a></h4>
                                <small><a href="{{ route('tech-single1', ['id' => 1]) }}" title="">19 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 1]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

            <div class="second-slot">
                <div class="masonry-box post-media">
                    <img src="{{asset('assets/img/upload/coba.png')}}" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="{{ route('tech-category', ['id' => 1]) }}" title="">Gadgets</a></span>
                                <h4><a href="{{ route('tech-single2', ['id' => 2]) }}" title="">Apa Saja Langkah-langkah untuk Mengatasi Hard Disk yang Penuh?</a></h4>
                                <small><a href="{{ route('tech-single2', ['id' => 2]) }}" title="">20 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 2]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <div class="last-slot">
                <div class="masonry-box post-media">
                    <img src="{{asset('assets/img/upload/coba.png')}}" alt="" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="{{ route('tech-category', ['id' => 1]) }}" title="">Technology</a></span>
                                <h4><a href="{{ route('tech-single3', ['id' => 3]) }}" title="">Cara Atasi Memori Internal Smartphone Yang Penuh</a></h4>
                                <small><a href="{{ route('tech-single3', ['id' => 3]) }}" title="">21 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 3]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('tech-single', ['id' => 4]) }}" title="">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{ route('tech-single4', ['id' => 4]) }}" title="">Data Tiba-tiba Hilang! Begini Cara Mencegah Kerusakan Data Pada Hard Disk</a></h4>
                                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                <small class="firstsmall"><a class="bg-orange" href="{{ route('tech-category', ['id' => 1]) }}" title="">Gadgets</a></small>
                                <small><a href="{{ route('tech-single4', ['id' => 4]) }}" title="">22 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 4]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('tech-single', ['id' => 5]) }}" title="">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{ route('tech-single5', ['id' => 5]) }}" title="">Bagaimana cara merawat harddisk?</a></h4>
                                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                <small class="firstsmall"><a class="bg-orange" href="{{ route('tech-category', ['id' => 1]) }}" title="">Technology</a></small>
                                <small><a href="{{ route('tech-single5', ['id' => 5]) }}" title="">23 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 5]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="{{asset('assets/img/upload/loh.png')}}" alt="" class="img-fluid">
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis">

                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('tech-single', ['id' => 6]) }}" title="">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{ route('tech-single6', ['id' => 6]) }}" title="">Perbedaan Cloud dan Server Traditional</a></h4>
                                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim nibh, maximus ac felis nec, maximus tempor odio.</p>
                                <small class="firstsmall"><a class="bg-orange" href="{{ route('tech-category', ['id' => 1]) }}" title="">Gadgets</a></small>
                                <small><a href="{{ route('tech-single6', ['id' => 6]) }}" title="">24 July, 2024</a></small>
                                <small><a href="{{ route('tech-author', ['id' => 6]) }}" title="">by Putra</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="{{ route('tech-single', ['id' => 7]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">5 Beautiful buildings you need..</h5>
                                        <small>12 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="{{ route('tech-single', ['id' => 8]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">Let's make an introduction for..</h5>
                                        <small>11 Jan, 2016</small>
                                    </div>
                                </a>

                                <a href="{{ route('tech-single', ['id' => 9]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">Did you see the most beautiful..</h5>
                                        <small>07 Jan, 2016</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="{{ route('tech-single', ['id' => 10]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">The Golden Rules you need to know..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ route('tech-single', ['id' => 11]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">The Golden Rules you need to know..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ route('tech-single', ['id' => 12]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="{{asset('assets/img/upload/demo.png')}}" alt="" class="img-fluid">
                                        <h5 class="mb-1">The Golden Rules you need to know..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-2">
                                <a href="https://www.facebook.com/" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="https://www.twitter.com/" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="https://www.tiktok.com/" class="social-button google-button">
                                    <i class="fa fa-tiktok"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="https://www.instagram.com/" class="social-button facebook-button">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </div>
                            <div class="col-2">
                                <a href="https://www.youtube.com/" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
