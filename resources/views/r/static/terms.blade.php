@extends('r.layouts.simple')
@section('content')
  <div class="page-tersm-and-privacy">
    <!-- <div class="container"> -->
      <h1><a href="{{route('user.terms-condition')}}"></h1>
      <!-- <div class="row justify-content-center"> -->
      <!-- <div class="col-sm-12 col-md-10 col-lg-7 col-xl-6"> -->
      <!-- <div class="content-block"> -->
          <!-- <div class="img-block">
              <img src="{{asset('r/img/landing-bg.png')}}" alt="">
          </div> -->
          <p class="content-text">Scarlett Johansson stars in the visually stunning Ghost in the Shell, an action-packed adventure set in a future world where people are enhanced with technology. Believing she was rescued from near death, Major (Johansson) becomes the first of her kind: a human mind inside an artificial body designed to fight the war against cyber-crime. While investigating a dangerous criminal, Major makes a shocking discovery – the corporation that created her lied about her past life in order to control her. Unsure what to believe, Major will stop at nothing to unravel the mystery of her true identity and exact revenge against the corporation she was built to serve.</p> 
  </div>


  <aside class="fixed-info">
    <div class="title-page-add">Questions ?</div>
    <div class="text-add">Fill free to contact us</div>
    <a href="{{route('user.contact')}}" class="butn btn-cta1b btn-lg">Contact us</a>
  </aside>
@endsection