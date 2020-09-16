@extends('admin/layout.layout')

@section('page_title','Manage Page')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Page</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                           <form class="form-horizontal form-label-left" method="post" action="{{url('admin/page/update/'.$result[0]->id)}}" enctype="multipart/form-data">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{$result[0]->name}}">
                                       <p class="my-1" style="color:red;" >@error('name')
                                           {{$message}}
                                              @enderror</p>
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="short_desc">{{$result[0]->slug}}</textarea>
                                       <p class="my-1" style="color:red;"> @error('slug')
                                           {{$message}}
                                          @enderror</p>
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="long_desc">{{$result[0]->description}}</textarea>
                                       <p class="my-1" style="color:red;">
                                          @error('description')
                                              {{$message}}
                                          @enderror
                                       </p>
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection