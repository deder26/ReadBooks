@extends('admin.dashboard.DashboardAdmin') 

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Edit Catagory Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'CatagoryUpdate', 'method'=>'POST','class'=>'form-horizontal'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Catagroy Name</label>
				<div class="col-md-6">
					<input type="text" name="name" value="{{$catagory->name}}" class="form-control" /> 
					<input type="hidden" name="id" value="{{$catagory->id}}" class="form-control" /> 
					@if($errors->has('name'))
					<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success"
						value="Update" />
				</div>
			</div>
			{{ Form::close()}}
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br> 
	@endfor
@endsection