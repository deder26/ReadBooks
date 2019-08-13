@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')

	@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif

	<div class="row">
		@foreach($blogs as $blog)
		<div class="col-md-8 col-md-offset-2 well">
			<div class="col-md-8 ">
				<label><strong>Tite: </strong></label>
				<span>{{$blog->title}}</span>
			</div>
			<?php 
			 $str = $blog->story;
			 $l = strlen($str);
			?>
			<div class="col-md-8 ">
				<label><strong>Story: </strong></label>
				<span>{{ str_limit($blog->story,200)}}</span>
				@if($l>200)
				<span>........</span>
				@endif
			</div>
			
			<div class="col-md-8 text-right">
				<a href="{{route('ViewStory',['id'=>$blog->id])}}"><button class="btn btn-success">View </button></a>
				<a href="{{route('DeleteStory',['id'=>$blog->id])}}"><button class="btn btn-danger">Delete </button></a>
			</div>
		</div>
		@endforeach
			<div class="row">
				<div class="col-md-12 text-center">
					{{$blogs->links()}}
				</div>
			</div>
	</div>
	@for($i = 0; $i < 14; $i++) 
		<br>
	@endfor
@endsection