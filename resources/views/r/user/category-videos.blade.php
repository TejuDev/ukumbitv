@extends('r.layouts.user-search')
@section('content')
    <div class="category-wrap">
        <div class="container">
            <div class="clearfix">
                @include('r.chunks._filter_video')
                
                <div class="global-main-content">
                    <div class="block-wrap">
                        <div class="title">New Videos</div> 
                        <div class="list-horizontal-wrapper">
                            @for ($group=1;$group<3;$group++)
                                @for($i=1; $i<5; $i++) 
                                        <div class="video-item video-item-dis">
                                            <a href="{{route('single-video',0)}}">
                                                <div class="video-img">
                                                    <img src="{{asset('r/img/video'.$i.'.png')}}" alt="">
                                                </div>
                                                <div class="video-title ellipsis-gradient">Transformers: Revenge of
                                                    the
                                                    Fallen
                                                </div>
                                            </a>
                                            <div class="video-info">
                                                <div class="video-genre">Drama</div>
                                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>125
                                                </div>
                                                <div class="butn-dis"><span
                                                            class="icon icon-thumbs-down-hand"></span>19
                                                </div>
                                            </div>
                                        </div> 
                                @endfor
                            @endfor
                        </div> 
                    </div>
                    <div class="video-list-wrap">
                        <div class="title">All Videos</div>
                        <div class="filter-block-wrap">
                            <div class="filter-block">
                                @include('r.chunks._sort_by')
                            </div>
                            <div class="filter-block">
                                @include('r.chunks._filter_tags')
                            </div>
                        </div>
                        <div class="video-list-block-wrap">
                            <div class="video-list-block">
                                @for($row=1;$row<4;$row++)
                                    @for($i=1;$i<6;$i++) 
                                        <div class="video-item">
                                            <a href="{{route('single-video',0)}}">
                                                <div class="video-img">
                                                    <img src="{{asset('r/img/video'.$i.'.png')}}" alt="">
                                                </div>
                                                <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                                    Fallen
                                                </div>
                                            </a>
                                            <div class="video-info">
                                                <div class="video-genre">Drama</div>
                                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>25
                                                </div>
                                            </div>
                                        </div> 
                                    @endfor
                                @endfor
                            </div>
                            <a href="" class="butn btn-cta1 btn-lg">Load more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection