@extends('layouts.admin')

@section('title', tr('categories'))

@section('content-header', tr('categories'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>{{tr('home')}}</a></li>
    <li class="active"><i class="fa fa-suitcase"></i> {{tr('categories')}}</li>
@endsection

@section('content')

	@include('notification.notify')

	<div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
          	<div class="box-header label-primary">
                <b style="font-size:18px;">{{tr('categories')}}</b>
                {{--<a href="{{route('admin.add.category')}}" class="btn btn-default pull-right">{{tr('add_category')}}</a>--}}
            </div>
            <div class="box-body">

            	@if(count($categories) > 0)

	              	<table id="example1" class="table table-bordered table-striped">

						<thead>
						    <tr>
						      <th>{{tr('id')}}</th>
						      <th>{{tr('category')}}</th>
						      <th>{{tr('picture')}}</th>
						      <th>{{tr('action')}}</th>
						    </tr>
						</thead>

						<tbody>
							@foreach($categories as $i => $category)

							    <tr id="row{{$category->id}}">
							      	<td>{{$i+1}}</td>
							      	<td>{{$category->name}}</td>
							      	<td>
	                                	<img style="height: 30px;" src="{{$category->picture}}">
	                            	</td>

									<td>
										<a href="edit-category/{{$category->id}}" class="btn btn-primary">Edit</a>
										<button class="btn btn-danger" onclick="return confirmDelete({{$category->id}});">Delete</button>
									</td>
							    </tr>
							@endforeach
						</tbody>
					</table>
				@else
					<h3 class="no-result">No results found</h3>
				@endif
            </div>
          </div>
        </div>
    </div>

@endsection

@section('scripts')
	<script type="text/javascript">
        function confirmDelete(id) {

            if (confirm("Remove category?")) {
                var fd = new FormData;

                fd.append('_token', $('#csrf-token').val());
                fd.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: 'delete-category',
                    contentType: false,
                    processData: false,
                    data: fd,
                    dataType: 'html',
                    success: function(data){
                        var rep = JSON.parse(data);
                        alert('Category successful deleted!'+id);
                        $('#row'+id).css('display', 'none');
                    },
                    error: function (data) {
                        alert('error '+data);
                    }
                });
            }

        }
	</script>
@endsection
