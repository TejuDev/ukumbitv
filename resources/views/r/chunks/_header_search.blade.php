<div class="header-wrap">
<header>
    <div class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-2">
                    <a href="/" class="logo-block">
                        <img src="{{asset('r/img/logo.png')}}" alt="">
                    </a>
                </div>
                <div class="col-sm-6">
                    <form action="{{route('search-all')}}">
                        <div class="input-wrap search-wrap">
                            <input type="search" name="key" placeholder="Titles, people, tags">
                            <div class="search-list-block">
                                <ul class="search-list">
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                    <li><a href="">Titles, people, tags</a></li>
                                </ul>
                            </div>
                            <button type="submit" class="butn-search">
                                <span class="icon icon-magnifying-glass"></span>
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-sm-4">
                    @include('r.chunks._login_block')
                </div>
            </div>
        </div>
    </div>
</header>
</div>