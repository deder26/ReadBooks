@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
	<div class="row">
		<div class="col-md-8 col-md-offset-2 well">
			<div class="col-md-8 ">
				<label><strong>{{$blog->title}} </strong></label>
			</div>
			<br>
			<br>
			<br>
			<div class="col-md-8 ">
				<label>{{ $blog->story }} </label>
			</div>
			<br>
			<br>
			<br>
			<div class="col-md-8 text-right">
				<a href="{{route('DeleteStory',['id'=>$blog->id])}}"><button class="btn btn-danger">Delete </button></a>
			</div>
			
		</div>
		
	</div>
	@for($i = 0; $i < 14; $i++) 
		<br>
	@endfor
@endsection