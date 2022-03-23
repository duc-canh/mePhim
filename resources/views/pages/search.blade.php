@extends('layout')

@section('title')
@endsection
@section('content')
<div class="container">
<h3 class="section-title"><span>Results</span></h3>
         <div class="row container" id="wrapper">
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
             
               <section id="halim-advanced-widget-2">
                 
                  <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                  @foreach($results->take(10) as $res)
                     <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                        <div class="halim-item">
                           <a class="halim-thumb" href="{{ route('web.movie',$res->slug)}}">
                              <figure><img class="lazy img-responsive" src="{{ $res->urlImage() }}" alt="BẠN CÙNG PHÒNG CỦA TÔI LÀ GUMIHO" title="{{ $res->title}}"></figure>
                              <span class="status">
                              @if($res->resulation == 0) SD
                                 @else
                                 HD 
                                 @endif
                              </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                              @if($res->subtitle == 0) Phụ đề
                                 @else
                                 Thuyết minh
                                 @endif
                           </span> 
                              <div class="icon_overlay"></div>
                              <div class="halim-post-title-box">
                                 <div class="halim-post-title ">
                                    <p class="entry-title">{{ $res->title}}</p>
                                    <p class="original_title">{{ $res->vn_title}}</p>
                                 </div>
                              </div>
                           </a>
                        </div>
                     </article>
                     @endforeach
                  </div>
               </section>
               <div class="clearfix"></div>
            </main>
           
         </div>
      </div>
@endsection