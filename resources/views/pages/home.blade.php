@extends('layout')
@section('title')

@endsection

@section('content')
<div class="container">
         <div class="row container" id="wrapper">
            <div class="halim-panel-filter">
               <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                  <div class="ajax"></div>
               </div>
            </div>
            <div id="halim_related_movies-2xx" class="wrap-slider">
                     <div class="section-bar clearfix">
                        <h3 class="section-title"><span>Phim Hot</span></h3>
                     </div>
                     <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($phim_hots as $phim_hot)
                        <article class="thumb grid-item post-38498">
                           <div class="halim-item">
                              <a class="halim-thumb" href="{{ route('web.movie',$phim_hot->slug)}}" title="{{ $phim_hot->title }}">
                                 <figure><img class="lazy img-responsive" src="{{ $phim_hot->urlImage() }}" alt="{{ $phim_hot->title }}" title="{{ $phim_hot->title }}"></figure>
                                 <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                                 <div class="icon_overlay"></div>
                                 <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                       <p class="entry-title">{{ $phim_hot->title }}</p>
                                     
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
                        owl.owlCarousel({loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
                     </script>
                  </div>
            <div class="col-xs-12 carausel-sliderWidget">
               <section id="halim-advanced-widget-4">
                  <div class="section-heading">
                     <!-- <a href="danhmuc.php" title="Phim Chiếu Rạp">
                     <span class="h-text">Phim Chiếu Rạp</span>
                     </a> -->
                     <!-- <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12" data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span></li>
                     </ul> -->
                  </div>
                  <div id="halim-advanced-widget-4-ajax-box" class="halim_box">
                    
                  </div>
               </section>
               <div class="clearfix"></div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                @foreach($categories_home as $cate_home)
               <section id="halim-advanced-widget-2">
                  <div class="section-heading">
                     <a href="danhmuc.php" title="Phim Bộ">
                     <span class="h-text">{{ $cate_home->title}}</span>
                     </a>
                  </div>
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                  @foreach($cate_home->movies->take(10) as $mov)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{ route('web.movie',$mov->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{ $mov->urlImage() }}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="{{ $mov->title}}"></figure>
                              <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{ $mov->title}}</p>
                                    <p class="original_title">My Roommate Is a Gumiho</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                  </div>
               </section>
               <div class="clearfix"></div>
               @endforeach
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
                                    <span class="is_trailer">Trailer</span>
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
         </div>
      </div>
@endsection