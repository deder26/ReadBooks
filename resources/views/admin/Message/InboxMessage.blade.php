@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
	<div class="row">
	@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
		@foreach($inbox as $msg)
		<div class="col-md-8 col-md-offset-2 well">
			<div class="col-md-8 ">
				<label><strong>From: </strong></label>
				<span>{{ $msg->email }}</span>
			</div>
			<div class="col-md-8 ">
				<label><strong>Subject: </strong></label>
				<span>{{ $msg->subject }}</span>
			</div>
			
			<div class="col-md-8 text-right">
				<a href="{{route('ReplyMessage',['id'=>$msg->id])}}"><button class="btn btn-success">View </button></a>
				<a href="{{route('DeleteMessage',['id'=>$msg->id])}}"><button class="btn btn-danger">Delete </button></a>
			</div>
		</div>
		@endforeach
			<div class="row">
				<div class="col-md-12 text-center">
					{{$inbox->links()}}
				</div>
			</div>
	</div>
	@for($i = 0; $i < 18; $i++) 
		<br>
	@endfor
@endsection