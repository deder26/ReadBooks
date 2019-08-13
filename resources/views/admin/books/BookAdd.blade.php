@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Add Book Form</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'BookSave', 'method'=>'POST','class'=>'form-horizontal', 'enctype' =>'multipart/form-data'])}}
			<div class="form-group">
				<label class="control-label col-md-4">Catagory Name</label>
				<div class="col-md-6">
					<select class="form-control" name="catagory_id">
						<option>----Select Catagory Name----</option> 
						@foreach($catagories as $catagory)
						<option value="{{$catagory->id}}">{{$catagory->name}}
						
						</option>
						@endforeach

					</select>
				    @if($errors->has('catagory_id'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Book Name</label>
				<div class="col-md-6">
					<input type="text" name="title" class="form-control" />
					 @if($errors->has('title'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Author Name</label>
				<div class="col-md-6">
					<textarea name="author" class="form-control"></textarea>
					 @if($errors->has('author'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Cover Picture</label>
				<div class="col-md-6">
					<input type="file" name="coverPic" accept="image/*" />
					 @if($errors->has('coverPic'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-md-4">Book</label>
				<div class="col-md-6">
					<input type="file" name="book" accept="file_extension" />
					 @if($errors->has('book'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-lg-offset-4">
					<input type="submit" name="btn" class="btn btn-success"
						value="Add" />
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
	@for($i = 0; $i < 6; $i++) 
		<br>
	@endfor
@endsection