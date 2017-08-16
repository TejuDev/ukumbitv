<nav class="main-nav-homevideo main-nav navbar navbar-default">
  <div class="container container-fluid-">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <a class="navbar-brand" href="https://ukumbitv.com">
				<img class="img-brand" src="{{asset('streamtube/images/logo1.png')}}" alt='UkumbiTv' />
      </a>

      <span style="color:white">Your payment plan: </span>


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">{{trans('messages.Toggle_navigation')}}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
      <ul class="nav navbar-nav navbar-right">  
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<img src="{{Auth::user()->picture}}" style="width:40px;height:40px;" data-pin-nopin="true" class="img-circle">
						<span class="user-name">{{Auth::user()->name}}</span>
           	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="{{route('user.profile')}}">{{trans('messages.account')}}</a></li> 
            <li role="separator" class="divider"></li>
            <li><a href="{{route('user.logout')}}">{{trans('messages.sign_out_of_ukumbiTV')}}</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



