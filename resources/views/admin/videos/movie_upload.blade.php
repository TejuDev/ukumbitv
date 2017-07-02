@extends('layouts.admin')

@section('title', tr('add_video'))

@section('content-header', tr('add_video'))

@section('styles')

    <link rel="stylesheet" href="{{asset('assets/css/wizard.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin-css/plugins/iCheck/all.css')}}">

    <link rel="stylesheet" href="{{asset('packages/dropzone/dropzone.css')}}">



@endsection

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.videos')}}"><i class="fa fa-video-camera"></i>{{tr('videos')}}</a></li>
    <li class="active"><i class="fa fa-video-camera"></i> {{tr('add_video')}}</li>
@endsection

@section('content')

    @include('notification.notify')


    <div class="row">
        <div class="col-lg-12">
            <section>
                <div class="wizard">


                    <form id="video-upload" method="POST" enctype="multipart/form-data" role="form" action="{{route('admin.save.movie')}}">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <!-- <h3>Video Details</h3> -->
                                <div style="margin-left: 15px"><small>Note : <span style="color:red">*</span> fields are mandatory. Please fill and click next.</small></div>
                                <hr>
                                <div class="">
                                    <input type="hidden" value="1" name="ajax_key">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title" class="">{{tr('title')}} * </label>
                                            <input type="text" required class="form-control" id="title" name="title" placeholder="{{tr('title')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="datepicker" class="">{{tr('publish_time')}} * </label>

                                            <input type="text" name="publish_time" placeholder="Select the Publish Time i.e YYYY-MM-DD" class="form-control pull-right" id="datepicker">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label>{{tr('duration')}} * : </label><small> Note: Format must be HH:MM:SS</small>

                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input required type="text" name="duration" class="form-control" data-inputmask="'alias': 'hh:mm:ss'" data-mask id="duration">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="ratings" class="">{{tr('ratings')}} *</label>
                                            <div class="starRating">
                                                <input id="rating5" type="radio" name="ratings" value="5">
                                                <label for="rating5">5</label>

                                                <input id="rating4" type="radio" name="ratings" value="4">
                                                <label for="rating4">4</label>

                                                <input id="rating3" type="radio" name="ratings" value="3">
                                                <label for="rating3">3</label>

                                                <input id="rating2" type="radio" name="ratings" value="2">
                                                <label for="rating2">2</label>

                                                <input id="rating1" type="radio" name="ratings" value="1">
                                                <label for="rating1">1</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="description" class="">{{tr('description')}} * </label>
                                            <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="reviews" class="">{{tr('reviews')}} * </label>
                                            <textarea  style="overflow:auto;resize:none" class="form-control" required rows="4" cols="50" id="reviews" name="reviews"></textarea>
                                        </div>
                                    </div>
                                </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="category_id">
                                            <div class="form-group">

                                                <label for="category" class="">Select category *</label>

                                                <select id="category" name="category_id" class="form-control">
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="year_id">
                                    <div class="form-group">

                                        <label for="year" class="">Select year *</label>

                                        <select id="year" name="year_id" class="form-control">
                                            @for ($i = 2017; $i > 1900; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="director_id">
                                    <div class="form-group">

                                        <label for="director" class="">Select directors *</label>

                                        <select id="director" name="director_id" class="form-control">
                                            @foreach($directors as $director)
                                                <option value="{{$director->id}}">{{$director->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="actor_id">
                                    <div class="form-group">

                                        <label for="actor" class="">Select actors *</label>

                                        <select id="actor" name="actor_id" class="form-control">
                                            @foreach($actors as $actor)
                                                <option value="{{$actor->id}}">{{$actor->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="default_image" class="">{{tr('default_image')}} *</label>
                                        <input type="file" id="default_image" accept="image/png,image/jpeg" name="default_image" placeholder="{{tr('default_image')}}" style="display:none" onchange="loadFile(this,'default_img')" required>
                                        <div>
                                            <img src="{{asset('images/320x150.png')}}" style="width:150px;height:75px;"
                                                 onclick="$('#default_image').click();return false;" id="default_img"/>
                                        </div>
                                        <p class="help-block">{{tr('image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="other_image1" class="">{{tr('other_image1')}} * </label>
                                        <input type="file" id="other_image1" accept="image/png,image/jpeg" name="other_image1" placeholder="{{tr('other_image1')}}" style="display:none" onchange="loadFile(this,'other_img1')" required>
                                        <div>
                                            <img src="{{asset('images/320x150.png')}}" style="width:150px;height:75px;"
                                                 onclick="$('#other_image1').click();return false;" id="other_img1"/>
                                        </div>
                                        <p class="help-block">{{tr('image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="other_image2" class="">{{tr('other_image2')}} *</label>
                                        <input type="file" id="other_image2" accept="image/png,image/jpeg" name="other_image2" placeholder="{{tr('other_image2')}}" style="display:none" onchange="loadFile(this,'other_img2')" required>
                                        <div>
                                            <img src="{{asset('images/320x150.png')}}" style="width:150px;height:75px;"
                                                 onclick="$('#other_image2').click();return false;" id="other_img2"/>
                                        </div>
                                        <p class="help-block">{{tr('image_validate')}} {{tr('rectangle_image')}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="video" class="">{{tr('video')}}</label>
                                        <input type="file" id="video" accept="video/mp4" name="video" placeholder="{{tr('picture')}}">
                                        <p class="help-block">{{tr('video_validate')}}</p>
                                    </div>
                                </div>


                            </div>

                            <div class="clearfix"></div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-info-full">Finish</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="jumbotron how-to-create" >

                <h3>Images <span id="photoCounter"></span></h3>
                <br />


                <form action="{{route('movie-upload-images')}}" class="dropzone" id="real-dropzone">
                <div class="dz-message">

                </div>

                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>

                <div class="dropzone-previews" id="dropzonePreview"></div>

                <h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>


                </form>
            </div>
            <div class="jumbotron how-to-create">
                <ul>
                    <li>Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>
        </div>
    </div>

    <!-- Dropzone Preview Template -->
    <div id="preview-template" style="display: none;">

        <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail=""></div>

            <div class="dz-details">
                <div class="dz-size"><span data-dz-size=""></span></div>
                <div class="dz-filename"><span data-dz-name=""></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

            <div class="dz-success-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>Check</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                    </g>
                </svg>
            </div>

            <div class="dz-error-mark">
                <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                    <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                    <title>error</title>
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                            <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                        </g>
                    </g>
                </svg>
            </div>

        </div>
    </div>
    <!-- End Dropzone Preview Template -->


    <div class="overlay">
        <div id="loading-img"></div>
    </div>

@endsection

@section('scripts')

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/moment.min.js')}}"></script>

    <script src="{{asset('admin-css/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>

    <script src="{{asset('admin-css/plugins/iCheck/icheck.min.js')}}"></script>

    <script src="{{asset('packages/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('packages/dropzone/dropzone-config.js')}}"></script>

    <script src="http://malsup.github.com/jquery.form.js"></script>


    <script type="text/javascript">

        var cat_url = "{{ url('select/sub_category')}}";
        var step3 = "{{REQUEST_STEP_3}}";
        var sub_cat_url = "{{ url('select/genre')}}";
        var final = "{{REQUEST_STEP_FINAL}}";

        $('#datepicker').datetimepicker({
            minTime: "00:00:00",
            minDate: moment(),
            autoclose:true,
        });
        $('#upload').show();
        $('#others').hide();
        $("#compress").show();
        $("#resolution").show();

        $("#video_upload").click(function(){
            $("#upload").show();
            $("#others").hide();
            $("#compress").show();
            $("#resolution").show();
        });

        $("#youtube").click(function(){
            $("#others").show();
            $("#upload").hide();
            $("#compress").hide();
            $("#resolution").hide();
        });

        $("#other_link").click(function(){
            $("#others").show();
            $("#upload").hide();
            $("#compress").hide();
            $("#resolution").hide();
        });

    </script>






@endsection


