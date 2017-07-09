@extends('layouts.admin')

@section('title', tr('add_category'))

@section('content-header', tr('add_category'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li><a href="{{route('admin.categories')}}"><i class="fa fa-suitcase"></i> {{tr('categories')}}</a></li>
    <li class="active">{{tr('add_category')}}</li>
@endsection

@section('content')

@include('notification.notify')

    <div class="row">

        <div class="col-md-10">

            <div class="box box-primary">

                <div class="box-header label-primary">
                    <b style="font-size:18px;">{{tr('add_category')}}</b>
                    <a href="{{route('admin.categories')}}" class="btn btn-default pull-right">{{tr('categories')}}</a>
                </div>

                <form class="form-horizontal" method="POST" enctype="multipart/form-data" role="form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="name" class="col-sm-1 control-label">{{tr('name')}} *</label>
                            <div class="col-sm-10">
                                <input type="text" required class="form-control" id="name" name="name" placeholder="Category Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="picture" class="col-sm-1 control-label">{{tr('picture')}} *</label>
                            <div class="col-sm-10">
                                <input type="file" required accept="image/png, image/jpeg" id="picture" name="picture" placeholder="{{tr('picture')}}" onchange="previewUploadedPhoto('picture', 'previewArea');">
                                <div id="previewArea"></div>
                                <p class="help-block">{{tr('image_validate')}} {{tr('image_square')}}</p>
                            </div>
                        </div>


                    </div>
                </form>
            
            </div>

        </div>

    </div>
<div class="box-footer">
    <progress id="progressbar" value="0" max="100"></progress>
    <button class="btn btn-primary btn-info-full" id="finishBtn" onclick="createCategory()">Save</button>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">
        function createCategory() {
            var fd = new FormData;

            fd.append('picture', $('#picture').prop('files')[0]);
            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());


            var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'create-category',
                contentType: false,
                processData: false,
                data: fd,
                dataType: 'html',
                xhr: function(){
                    var xhr = $.ajaxSettings.xhr(); // получаем объект XMLHttpRequest
                    xhr.upload.addEventListener('progress', function(evt){ // добавляем обработчик события progress (onprogress)
                        if(evt.lengthComputable) { // если известно количество байт
                            // высчитываем процент загруженного
                            var percentComplete = Math.ceil(evt.loaded / evt.total * 100);
                            // устанавливаем значение в атрибут value тега <progress>
                            // и это же значение альтернативным текстом для браузеров, не поддерживающих <progress>
                            progressBar.val(percentComplete).text('Uploaded ' + percentComplete + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(data){
                    var rep = JSON.parse(data);
                    console.log(rep);
                    alert('Category successful created!');
                },
                error: function (data) {
                    alert('error '+data);
                }
            });
        }

        function previewUploadedPhoto(controlID, previewID) {
            var imgWidth = 300;
            var imgHeight = 300;
            var imgSize = '300x300';
            if (document.getElementById(controlID).files) {
                var file = document.getElementById(controlID).files[0];
                if (file.type.match("image.*")) {
                    if (parseInt(file.size) <= 4 * 1024 * 1024) {
                        var reader = new FileReader();
                        reader.onload = (function (theFile) {
                            return function (e) {
                                var img = new Image();
                                img.src = e.target.result;

                                img.onload = function () {
                                    if (img.width < imgWidth || img.height < imgHeight) {
                                        $("#" + previewID).html("<b class='alert-danger'>The image size should be "+imgSize+"</b>");
                                        file.value = null;
                                    }
                                    else {
                                        $("#" + previewID).html('<img class="thumb img-responsive" src="' + e.target.result + '" title="' + theFile.name + '" style="max-width:200px" />');
                                    }
                                };
                            };
                        })(file);
                        reader.readAsDataURL(file);
                    }
                    else {
                        $("#" + previewID).html("<b class='alert-danger'>The maximum image size is 4 MB</b>");
                        file.value = null;
                    }
                }
                else {
                    $("#" + previewID).html("<b class='alert-danger'>This file is not an image. please choose the image</b>");
                    file.value = null;
                }
            }
        }

    </script>

    @endsection