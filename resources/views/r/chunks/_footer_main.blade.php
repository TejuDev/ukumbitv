<div class="footer-wrap">
 <footer>
  <div class="footer-top">
   <div class="container">
    <div class="row">
     <div class="col-sm-2 offset-sm-1">
      <div class="list-title">About us</div>
      <ul class="footer-list">
       <li><a href="">About Us</a></li>
       <li><a href="">Jobs</a></li>
       <li><a href="">Contact Us</a></li>
      </ul>
     </div>
     <div class="col-sm-2">
      <div class="list-title">About The Project</div>
      <ul class="footer-list">
       <li><a href="">Privacy Policy</a></li>
       <li><a href="">Terms of Use</a></li>
       <li><a href="">Advertising</a></li>
       <li><a href="">Help center</a></li>
      </ul>
     </div>
     <div class="col-sm-2">
      <div class="list-title">Devices</div>
      <ul class="footer-list">
       <li><a href="">Mobile</a></li>
       <li><a href="">TV</a></li>
       <li><a href="">Media players</a></li>
       <li><a href="">PC</a></li>
       <li><a href="">Android</a></li>
       <li><a href="">Apple</a></li>
      </ul>
     </div>
     <div class="col-sm-3 offset-sm-1">
      <div class="last-block">
       <div class="soc-block">
        <div class="list-title">{{l('Get Social')}}</div>
        <ul class="social-list">
         <li><a href="" class="icon icon-facebook"></a></li>
         <li><a href="" class="icon icon-twitter"></a></li>
         <li><a href="" class="icon icon-instagram"></a></li>
        </ul>
       </div>
       <div class="lang-block">
        <span>{{l('Language')}}:</span>
        <a href="{{url('setlocale/fr')}}" @if(App::isLocale('fr'))class="active"@endif>{{l('French')}}</a>
        <a href="{{url('setlocale/en')}}" @if(App::isLocale('en'))class="active"@endif>{{l('English')}}</a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="footer-bottom">
   <div class="container">
    <div class="row">
     <div class="col">
      <div class="footer-bottom-text">
       @2017 Ukumbi TV
      </div>
     </div>
    </div>
   </div>
  </div>
 </footer>
</div>