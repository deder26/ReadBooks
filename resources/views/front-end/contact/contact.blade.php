@extends('front-end.master') 

@section('title')
<title>Contact Us</title>
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 well text-success text-center">
			<h4><strong>You can contact us by the message bar bellow or can contact us by:</strong></h4>
			<br>
			<br>
		<div class="col-md-8">
			<h4><strong>Email: </strong><span style="color:black">{{$contact->email}}</span></h4>
		</div>
		<br>
			
		<div class="col-md-8">
			<h4><strong>Mobile: </strong><span style="color:black">{{$contact->contact}}</span></h4>
		</div>
<br><br>
		<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Message Us</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif 
			{{ Form::open(['route'=>'SendMessage', 'method'=>'POST','class'=>'form-horizontal', 'enctype' =>'multipart/form-data'])}}
			
			<div class="form-group">
				<label class="col-md-2"></label>
				<div class="col-md-8">
					<input type="text" name="sender_name" class="form-control" placeholder="Name..."/>
					 @if($errors->has('sender_name'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2"></label>
				<div class="col-md-8">
					<input type="text" name="sender_email" class="form-control" placeholder="abc@example.com"/>
					
					 @if($errors->has('sender_email'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
			<label class="col-md-2"></label>
				<div class="col-md-8">
					<input type="text" name="sender_subject" class="form-control" placeholder="Subject..."/>
					 @if($errors->has('sender_subject'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2"></label>
				<div class="col-md-8">
					<input type="hidden" name="status" value="0" class="form-control"/>
					<textarea name="sender_message" class="form-control" placeholder="Write message here..."></textarea>
					 @if($errors->has('sender_message'))
						<span class="text-danger">can't be empty</span>
					@endif
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-8 col-lg-offset-1">
					<input type="submit" name="btn" class="btn btn-success"
						value="Send" />
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
	
			

	</div>
	
</div>


@endsection