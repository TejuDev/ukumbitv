<!-- was trying to emulate the NETFLIX style "back" button plus Facebook comment redirection -->
<nav class="main-nav-singlevideo main-nav navbar navbar-default">
  <div class="container container-fluid-">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
			
			<button id="btn-history-back" class="btn btn-link navbar-brand">
				<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> 
				{{trans('messages.back_to_browse')}} 
			</button> 


      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">{{trans('messages.Toggle_navigation')}}</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>    
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active-">
        	<a href="#comment_or_share">
        		<i class="fa fa-facebook-official" aria-hidden="true"></i>
        		{{trans('messages.comment_or_share')}} 
        	</a>
        </li> 
      </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


