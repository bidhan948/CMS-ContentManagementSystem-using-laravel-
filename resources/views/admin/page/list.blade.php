@extends('admin/layout.layout')

@section('page_title','page Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>page</h4>
		 <h2><a href="{{url('/admin/page/add')}}">Add page</a></h2>
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
									<th>Name</th>
									<th>Slug</th>
									<th colspan="2">Action</th>
								 </tr>
							  </thead>
							  <tbody>
								  @foreach ($result as $list)
									<tr>
									<td>{{$list->id}}</td>
									<td>{{$list->name}}</td>
									<td>{{$list->slug}}</td>
									<td><a href="{{url('admin/page/delete/'.$list->id)}}" class="text-danger">delete</a></td>
									<td><a href="{{url('admin/page/edit/'.$list->id)}}" class="text-success"><i class="fas fa-edit"></i></a></td>
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