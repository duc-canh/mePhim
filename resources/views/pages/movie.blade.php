@extends('layout')

@section('title')
@endsection

@section('content')
<div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span> » <span><a href="{{ route('web.category',$movie->category->slug )}}">{{ $movie->category->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{ $movie->title}}</span></span></span></span></div>
                     </div>
                  </div>
               </div>
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
               <section id="content" class="test">
                  <div class="clearfix wrap-content">
                    
                     <div class="halim-movie-wrapper">
                        <div class="title-block">
                           <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                              <div class="halim-pulse-ring"></div>
                           </div>
                           <div class="title-wrapper" style="font-weight: bold;">
                              Bookmark
                           </div>
                        </div>
                        <div class="movie_info col-xs-12">
                           <div class="movie-poster col-md-3">
                              <img class="movie-thumb" src="{{ $movie->urlImage() }}" alt="{{ $movie->title}}">
                              <div class="bwa-content">
                                 <div class="loader"></div>
                                 <a href="{{ route('web.watch',$movie->slug)}}" class="bwac-btn">
                                 <i class="fa fa-play"></i>
                                 </a>
                              </div>
                           </div>
                           <div class="film-poster col-md-9">
                              <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{ $movie->title}}</h1>
                              <h2 class="movie-title title-2" style="font-size: 12px;">{{ $movie->title}}</h2>
                              <ul class="list-info-group">
                                <li class="list-info-group-item"><span>Trạng Thái</span> : <span class="quality"> @if($movie->resulation == 0) SD
                                 @else
                                 HD 
                                 @endif</span><span class="episode">@if($movie->subtitle == 0) Phụ đề
                                 @else Thuyết minh
                                 @endif</span></li>
                                 <!-- - <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">7.2</span></li>  -->
                                 <li class="list-info-group-item"><span>Thời lượng</span>{{ $movie->time }}</li>
                                 <li class="list-info-group-item"><span>Thể loại</span> : <a href="{{ route('web.genre',$movie->genre->slug)}}" rel="category tag">{{ $movie->genre->title}}</a></li>
                                 <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{ route('web.country',$movie->country->slug)}}" rel="tag">{{ $movie->country->title}}</a></li>
                                 <li class="list-info-group-item"><span>Danh mục</span> : <a class="director" rel="nofollow" href="{{ route('web.category',$movie->category->slug )}}" title="Cate Shortland">{{ $movie->category->title }}</a></li>
                                 <li class="list-info-group-item"><span>Lượt View </span>: {{$movie->views_count}}</li>
                                 <!-- <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;"><span>Diễn viên</span> : <a href="" rel="nofollow" title="C.C. Smiff">C.C. Smiff</a>, <a href="" rel="nofollow" title="David Harbour">David Harbour</a>, <a href="" rel="nofollow" title="Erin Jameson">Erin Jameson</a>, <a href="" rel="nofollow" title="Ever Anderson">Ever Anderson</a>, <a href="" rel="nofollow" title="Florence Pugh">Florence Pugh</a>, <a href="" rel="nofollow" title="Lewis Young">Lewis Young</a>, <a href="" rel="nofollow" title="Liani Samuel">Liani Samuel</a>, <a href="" rel="nofollow" title="Michelle Lee">Michelle Lee</a>, <a href="" rel="nofollow" title="Nanna Blondell">Nanna Blondell</a>, <a href="" rel="nofollow" title="O-T Fagbenle">O-T Fagbenle</a></li> -->
                              </ul>
                              <div class="movie-trailer hidden"></div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div id="halim_trailer"></div>
                     <div class="clearfix"></div>
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                              <h3>Phim {{ $movie->title }}</a> - {{ $movie->release_year}} - {{ $movie->country->title }}:</h3>
                              <p>{{ $movie->description}}</p>
                             
                           </article>
                        </div>
                     </div>
                     @if($movie->trainer != null)
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trainner Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                           <iframe width="100%" height="300" src="{{ $movie->trainer }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </article>
                        </div>
                     </div>
                     @else
                     <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Trainner Phim</span></h2>
                     </div>
                     <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                           <article id="post-38424" class="item-content">
                          Bộ phim không có trainer !!!!
                           </article>
                        </div>
                     </div>
                     @endif
                  </div>
                  
               </section>
               <section class="related-movies">
               <div id="halim_related_movies-2xx" class="wrap-slider">
                  <div class="section-bar clearfix">
                      <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                  </div>
                  <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
              
            @foreach($movie_related as $mov_rela)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{ route('web.movie',$mov_rela->slug)}}" title="Đại Thánh Vô Song">
                                 <figure><img class="lazy img-responsive" src="{{ $mov_rela->urlImage() }}" alt="{{ $mov_rela->title }}" title="{{ $mov_rela->title }}"></figure>
                                 <span class="status">
                                 @if($mov_rela->resulation == 0) SD
                                 @else
                                 HD 
                                 @endif
                                 </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                                 @if($mov_rela->subtitle == 0) Phụ đề
                                 @else
                                 Thuyết minh
                                 @endif
                              </span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{ $mov_rela->title }}</p>
                                       <p class="original_title">{{ $mov_rela->vn_title}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                        </article>
                       @endforeach
           
                  </div>
            <script>
               jQuery(document).ready(function($) {				
               var owl = $('#halim_related_movies-2');
               owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 4}}})});
            </script>
               </div>
            </section>
            </main>
            <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
               <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                  <div class="section-bar clearfix">
                     <div class="section-title">
                        <span>Top Views</span>
                        <!-- <ul class="halim-popular-tab" role="tablist">
                           <li role="presentation" class="active">
                              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="today">Day</a>
                           </li>
                           <li role="presentation">
                              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="week">Week</a>
                           </li>
                           <li role="presentation">
                              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="month">Month</a>
                           </li>
                           <li role="presentation">
                              <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10" data-type="all">All</a>
                           </li>
                        </ul> -->
                     </div>
                  </div>
                  <section class="tab-content">
                     <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                           @foreach($movie_views as $movie_view)
                           <div class="item post-37176">
                              <a href="{{ route('web.movie',$movie_view->slug)}}" title="{{ $movie_view->title}}">
                                 <div class="item-link">
                                    <img src="{{ $movie_view->urlImage() }}" class="lazy post-thumb" alt="{{ $movie_view->title}}" title="{{ $movie_view->title}}" />
                                    <span class="is_trailer">@if($movie_view->subtitle == 0) Phụ đề
                                 @else
                                 Thuyết minh
                                 @endif</span>
                                 </div>
                                 <p class="title">{{ $movie_view->title}}</p>
                              </a>
                              <div class="viewsCount" style="color: #9d9d9d;">{{ $movie_view->views_count}} lượt xem</div>
                              <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                              </div>
                           </div>
                          @endforeach
                          
                          
                        </div>
                     </div>
                  </section>
                  <div class="clearfix"></div>
               </div>
            </aside>
            <!-- <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4"></aside> -->
         </div>
      </div>
@endsection