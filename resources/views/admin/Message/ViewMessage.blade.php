@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
	<div class="row">
		<div class="col-md-8 col-md-offset-2 well">
			<div class="col-md-8 ">
				<label><strong>From: </strong></label>
				<span>{{$msg->email}}</span>
			</div>
			<div class="col-md-8 ">
				<label><strong>Subject: </strong></label>
				<span>{{$msg->subject}}</span>
			</div>
			<br>
			<br>
			<br>
			<div class="col-md-8 ">
				<label>{{ $msg->message }} </label>
			</div>
			<br>
			<br>
			<br>
			<div class="col-md-8 text-right">
				<a href="{{route('ReplyMessage',['id'=>$msg->id])}}"><button class="btn btn-success">Reply</button></a>
				<a href="{{route('DeleteMessage',['id'=>$msg->id])}}"><button class="btn btn-danger">Delete </button></a>
			</div>
			
		</div>
		
	</div>
	@for($i = 0; $i < 14; $i++) 
		<br>
	@endfor
@endsection
