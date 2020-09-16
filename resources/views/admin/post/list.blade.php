@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/post/add">Add Post</a></h2>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
		 					<h2 class="my-2 text-success">{{session('msg')}}</h2>

						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th>ID</th>
									<th>Title</th>
									<th>Short Desc</th>
									<th>Image</th>
									<th>Date</th>
									<th colspan="2">Action</th>
								 </tr>
							  </thead>
							  <tbody>
								  @foreach ($result as $list)
									<tr>
									<td>{{$list->id}}</td>
									<td>{{$list->title}}</td>
									<td>{{$list->short_desc}}</td>
									<td><img src="{{asset('storage/post/'.$list->image)}}" alt="" width="200px"></td>
									<td>{{$list->post_date}}</td>
									<td><a href="{{url('admin/post/delete/'.$list->id)}}" class="text-danger">delete</a></td>
									<td><a href="{{url('admin/post/edit/'.$list->id)}}" class="text-success"><i class="fas fa-edit"></i></a></td>
									</tr>
								  @endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection