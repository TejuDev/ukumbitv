<header class="landing-header"> 
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="ukb-navbar-brand navbar-brand" href="/"><img src="{{asset('r/img/logo.png')}}" alt="UkumbiTV" title="UkumbiTV"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
	      <ul class="nav navbar-nav navbar-right"> 
	      	<li>
	      		<a href="{{route('user.login.form')}}" class="btn btn-link btn-lg">{{l("Sign in")}}</a>
	      	</li> 
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>  



  <article class="landing-header__content">    
    <!-- <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xl-5 offset-xl-1"> -->
    <h1>{{trans('messages.home_title1')}}</h1>
    <p>{{trans('messages.home_substitle1')}}</p>
    <div>
      <a href="{{route('user.register.form')}}" class="btn btn-cta1b btn-lg">{{trans('messages.home_cta')}}</a>
    </div>
    <!-- </div>   -->
  </article> 



	<div id="intro-video"></div>
	<!-- <a class="btn-down" href="#section1">
   	<span class="icon icon-scroll-arrow-to-down"></span> 
  </a> -->
</header>