@extends('r.layouts.user-dashboard')
@section('content')
    <div class="main-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <aside>
                        <div class="aside-block">
                            <ul class="aside-menu">
                                <li>
                                    <a href="" class="all">
                                        <span class="icon icon-folder"></span>
                                        <span class="list-text">All videos</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="movies">
                                        <span class="icon icon-film"></span>
                                        <span class="list-text">Movies</span>
                                    </a>
                                    <div class="sub-menu-block">
                                        <div class="sub-menu-butn"></div>
                                        <ul class="sub-menu">
                                            <li>
                                                <a href="">
                                                    All movies
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <span class="list-text">Short</span>
                                                    <span class="time">10 min</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <span class="list-text">Medium</span>
                                                    <span class="time">45 min max</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <span class="list-text">Feature</span>
                                                    <span class="time">45 min up</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="" class="shows">
                                        <span class="icon icon-television"></span>
                                        <span class="list-text">TV Shows</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="web">
                                        <span class="icon icon-screen_play"></span>
                                        <span class="list-text">Web Series</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="doc">
                                        <span class="icon icon-film-roll"></span>
                                        <span class="list-text">Documentaries</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-10">
                    <div class="main-top-block">
                        <img src="{{ asset('r/img/bg-video.png')}}" alt="">
                        <div class="layer"></div>
                        <div class="video-info-block">
                            <div class="video-title">Ghost in the Shell</div>
                            <div class="video-info-text">
                                <span class="age">16+</span>
                                <span class="date">March 2017</span>
                                <span class="genre">Drama, Comedy, Triller</span>
                                <div class="series-text">1 Season, 12 Series</div>
                            </div>
                            <div class="actors-block">
                                <div class="actors-title">Actors</div>
                                <p class="actors-list">Scarlett Johansson, Beat Takeshi Kitano, Michael Carmen Pitt,
                                    Pilou Asbaek, Chin Han, Juliette Binoche</p>
                            </div>
                            <div class="butn-block">
                                <div class="play-block">
                                    <a href="" class="butn butn-orange-dark butn-play upper"><span
                                                class="icon icon-play-arrow"></span>Play</a>
                                    <a href="" class="butn butn-orange-dark upper">Add to list</a>
                                </div>
                                <div class="share-block">
                                    <a href="" class="butn-share"><span>f</span>Share</a>
                                    <a href="" class="butn-like"><span class="icon icon-thumbs-up"></span>158</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="video-slider-wrap">
                        <div class="title">New Videos</div>
                        <div class="video-slider-block-wrap">
                            <div class="video-slider-block">
                                @for($i=0;$i<5;$i++)
                                    <div class="video-item-block">
                                        <div class="video-item">
                                            <div class="video-img">
                                                <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                            </div>
                                            <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                                Fallen
                                            </div>
                                            <div class="video-info">
                                                <div class="video-genre">Drama</div>
                                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor

                                @for($i=0;$i<5;$i++)
                                    <div class="video-item-block">
                                        <div class="video-item">
                                            <div class="video-img">
                                                <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                            </div>
                                            <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                                Fallen
                                            </div>
                                            <div class="video-info">
                                                <div class="video-genre">Drama</div>
                                                <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="video-slider-wrap">
                        <div class="title">My List</div>
                        <div class="video-slider-block">
                        @for($i=0;$i<5;$i++)
                            <div class="video-item-block">
                                <div class="video-item">
                                    <div class="video-img">
                                        <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                    </div>
                                    <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                        Fallen
                                    </div>
                                    <div class="video-info">
                                        <div class="video-genre">Drama</div>
                                        <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        @for($i=0;$i<5;$i++)
                            <div class="video-item-block">
                                <div class="video-item">
                                    <div class="video-img">
                                        <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                    </div>
                                    <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                        Fallen
                                    </div>
                                    <div class="video-info">
                                        <div class="video-genre">Drama</div>
                                        <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                    </div>
                                </div>
                            </div>
                        @endfor

                        </div>
                    </div>
                    <div class="video-slider-wrap">
                        <div class="title">Popular Videos</div>
                        <div class="video-slider-block">
                            @for($i=0;$i<5;$i++)
                                <div class="video-item-block">
                                    <div class="video-item">
                                        <div class="video-img">
                                            <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                        </div>
                                        <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                            Fallen
                                        </div>
                                        <div class="video-info">
                                            <div class="video-genre">Drama</div>
                                            <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                            @for($i=0;$i<5;$i++)
                                <div class="video-item-block">
                                    <div class="video-item">
                                        <div class="video-img">
                                            <img src="{{asset('r/img/video'.($i+1).'.png')}}" alt="">
                                        </div>
                                        <div class="video-title ellipsis-gradient">Transformers: Revenge of the
                                            Fallen
                                        </div>
                                        <div class="video-info">
                                            <div class="video-genre">Drama</div>
                                            <div class="butn-like"><span class="icon icon-thumbs-up"></span>25</div>
                                        </div>
                                    </div>
                                </div>
                            @endfor

                        </div>
                    </div>
                    <div class="video-slider-wrap">
                        <div class="title">Liked Videos</div>
                        <div class="no-video">
                            <div>No liked videos yet</div>
                            <p>Press <span class="icon icon-thumbs-up"></span> to like the video</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection