@extends('layouts.admin')

@section('title', 'Edit Language')

@section('content-header', 'Edit Language')

@section('breadcrumb')

@endsection

@section('content')

    @include('notification.notify')

    <div class="row"> 
    	<div class="col-lg-12"> 
      	<div class="box tab-content tab-content-langedit">  
          <form class="form-horizontal" method="POST" enctype="multipart/form-data" role="form"> 
            <div class="row"> 
              <input type="hidden" id="langid" name="id" value="{{$lang->id}}">

              <div class="form-group col-sm-12">
                <label for="name">{{tr('name')}}</label>
                <input type="text" required class="form-control" value="{{$lang->title}}" id="name" name="name">
              </div> 
            </div> 
          </form> 
        </div> 
      </div> 
			

			<div class="col-md-4 col-md-offset-8 form-group">
		    <button class="btn btn-submit btn-block" id="finishBtn" onclick="editLang()">Save</button>
			</div>
			

			<div class="col-md-12 form-group">
		    <progress id="progressbar" style="width:100%" value="0" max="100"></progress>
			</div>
    </div><!-- row --> 
@endsection

@section('scripts')

    <script type="text/javascript">
        function editLang() {
            var fd = new FormData;

            fd.append('_token', $('#csrf-token').val());
            fd.append('name', $('#name').val());
            fd.append('id', $('#langid').val());

            //fd.append('images', dropImages.join(';'));
            var progressBar = $('#progressbar');

            $.ajax({
                type: 'POST',
                url: 'update-lang',
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
                    //var rep = JSON.parse(data);
                    //console.log(rep);
                    alert('Language successful edited!');
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