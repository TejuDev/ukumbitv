
@extends('static.legal-master-page')


@section('content-title')
{{trans('messages.account')}}
@endsection

@section('content')
	<style>
		h1 { 
    	margin-bottom: 0;
		}
		.p-acc hr { 
    	border-top: 1px solid #999;
    	margin-top: 30px;
    	margin-bottom: 30px;
		}
		.p-acc h2 {
			margin-top: 0;
			margin-bottom: 15px;
	    font-size: 18px;
	    text-transform: uppercase;
		}
		.p-acc .btn-cta {
			max-width: 200px;
    	padding: 10px;
		}
	</style>
 	<div class="p-acc row">
 		<div class="col-md-12">

 			<hr>

 			<div class="row">
 				<div class="col-md-4">
		 				<h2>Membership &amp; billing</h2>
		 				<a href="#" class="btn btn-default btn-block btn-cta">Cancel Membership</a>
		 			</div>
		 			<div class="col-md-8">
		 				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt necessitatibus exercitationem aliquid provident tenetur impedit amet error, veniam eligendi nam commodi modi porro optio ab non autem quae magni.
		 			</div> 
 			</div>

 			<hr>

 			<div class="row">
 				<div class="col-md-4">
		 				<h2>PLAN DETAILS</h2>
		 				<a href="#" class="btn btn-default btn-block btn-cta">Cancel Membership</a>
		 			</div>
		 			<div class="col-md-8">
		 				<div class="row">
		 					<div class="col-md-6 text-left">
		 						<b>Plan B</b>
		 					</div>
		 					<div class="col-md-6 text-right">
		 						<a href="#">Change Plan</a>
		 					</div>
		 				</div>
		 			</div> 
 			</div>
 			<!-- <section class="blk col-md-12" style="border-top: 1px solid #999;">
	 			<div class="row">
		 			<div class="col-md-3">
		 				<h2>Membership &amp; billing</h2>
		 				<a href="#" class="btn btn-default btn-block">Cancel Membership</a>
		 			</div>
		 			<div class="col-md-9">
		 				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt necessitatibus exercitationem aliquid provident tenetur impedit amet error, veniam eligendi nam commodi modi porro optio ab non autem quae magni.
		 			</div> 
	 			</div>
	 		</section> -->
 		</div>



 		<!-- <section class="blk col-md-12" style="border-top: 1px solid #999;">
 			<div class="row">
	 			<div class="col-md-3">
	 				<h2>Membership &amp; billing</h2>
	 				<a href="#" class="btn btn-default btn-block">Cancel Membership</a>
	 			</div>
	 			<div class="col-md-9">
	 				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt necessitatibus exercitationem aliquid provident tenetur impedit amet error, veniam eligendi nam commodi modi porro optio ab non autem quae magni.
	 			</div> 
 			</div>
 		</section>


 		<section class="blk col-md-12" style="border-top: 1px solid #999;">
 			<div class="row">
	 			<div class="col-md-3">
	 				<h2>Membership &amp; billing</h2>
	 				<a href="#" class="btn btn-default btn-block">Cancel Membership</a>
	 			</div>
	 			<div class="col-md-9">
	 				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt necessitatibus exercitationem aliquid provident tenetur impedit amet error, veniam eligendi nam commodi modi porro optio ab non autem quae magni.
	 			</div> 
 			</div>
 		</section>

 		
 		<section class="blk col-md-12" style="border-top: 1px solid #999;">
 			<div class="row">
	 			<div class="col-md-3">
	 				<h2>Membership &amp; billing</h2>
	 				<a href="#" class="btn btn-default btn-block">Cancel Membership</a>
	 			</div>
	 			<div class="col-md-9">
	 				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic deserunt necessitatibus exercitationem aliquid provident tenetur impedit amet error, veniam eligendi nam commodi modi porro optio ab non autem quae magni.
	 			</div> 
 			</div>
 		</section> -->
 	</div><!-- row -->


 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>
 	<br>


    <div class="page-inner col-sm-9 col-md-10 profile-edit">
        
      <div class="profile-content">
        <div class="row no-margin">
          <div class="col-sm-7 profile-view">
            <div class="edit-profile profile-view">
                <div class="profile-details">
                    <div class="sub-profile">
                        <h4 class="edit-head">{{tr('profile')}}</h4>

                        <!-- <div class="image-profile">
                            @if(Auth::user()->picture)
                                <img src="{{Auth::user()->picture}}">
                            @else
                                <img src="{{asset('placeholder.png')}}">
                            @endif                                
                        </div>  -->

                        <div class="profile-title">
                            <h3>{{Auth::user()->name}}</h3>
                            
                            @if(Auth::user()->login_by == 'manual')
                                <h4>{{Auth::user()->email}}</h4>
                            @endif
                            
                            @if(Auth::user()->user_type)
                                <p style="color:#cc181e">The Pack will Expiry within <b>{{get_expiry_days(Auth::user()->id)}} days</b></p>
                            @endif
                            <p>{{Auth::user()->mobile   }}</p>  
                            <p>{{Auth::user()->description}}</p>
                        </div><!--end of profile-title-->
                        <form>
                        <br>
                            <div class="change-pwd edit-pwd edit-pro-btn">

                                @if(envfile('PAYPAL_ID') && envfile('PAYPAL_SECRET'))

                                    <a href="{{route('paypal' , Auth::user()->id)}}" class="btn btn-warning">{{tr('payment')}}</a>
                                     
                                @endif

                                <a href="{{route('user.update.profile')}}" class="btn btn-primary">{{tr('edit_profile')}}</a>
                                
                                @if(Auth::user()->login_by == 'manual')
                                    <a href="{{route('user.change.password')}}"
                                class="btn btn-danger">{{tr('change_password')}}</a>

                                @endif
                            </div> 
                        </form>                                
                    </div><!--end of sub-profile-->                            
                </div><!--end of profile-details-->                           
            </div><!--end of edit-profile--> 
          </div><!--profile-view end--> 


            <?php $wishlist = wishlist(Auth::user()->id); ?>
            
            @if(count($wishlist)) 
              <!-- <div class="mylist-profile col-sm-5">
                  <h4 class="mylist-head">{{tr('wishlist')}}</h4>

                  <ul class="history-list profile-history"> 
                    @foreach($wishlist as $i => $video) 
                      <li class="sub-list row no-margin">
                          <div class="main-history">
                              <div class="history-image">
                                  <a href="{{route('user.single' , $video->admin_video_id)}}"><img src="{{$video->default_image}}"></a>                        
                              </div> 

                              <div class="history-title">
                                  <div class="history-head row">
                                      <div class="cross-title">
                                          <h5><a href="{{route('user.single' , $video->admin_video_id)}}">{{$video->title}}</a></h5>
                                          <p class="duration">{{tr('duration')}}: {{$video->duration}}</p>
                                      </div> 
                                      <div class="cross-mark">
                                          <a onclick="return confirm('Are you sure?');" href="{{route('user.delete.wishlist' , array('wishlist_id' => $video->wishlist_id))}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      </div>                        
                                  </div>  
                              </div>  
                          </div> 
                      </li> 
                    @endforeach 
                  </ul>    
              </div>  -->
            @endif 
        </div><!--end of profile-content row-->
      
      </div>

    </div>

 

@endsection