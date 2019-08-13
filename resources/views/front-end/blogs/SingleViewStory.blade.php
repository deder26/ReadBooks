@extends('front-end.master') 

@section('title')
<title>{{$blog->title}}</title>
@endsection 

@section('content')
<style>

/* Dropdown Button */
.dropbtn {
  background-color: #ebebeb;
  color: #888888;
  padding: 10px;
  font-size: 12px;
  
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown1-content1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown1-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown1-content1 a:hover {background-color: #ebebeb;}

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown1-content1 {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {background-color: #ebebeb;}
</style>



<div  class="col-md-9" align="right">
	<div class="dropdown1" style="padding: 5px" align="center">
		<img alt="" src="{{asset('/')}}front/images/more.png" height="15px" width="15px">

		<div class="dropdown1-content1" align="left">
		
			@if(Session::get('user_id')==$blog->user_id)
			<a href="{{route('EditStory',['id'=>$blog->id])}}">Edit</a> 
			@endif
			@if(Session::get('user_id'))
				@if(Session::get('user_id')==$blog->user_id  || Auth::user()->isAdmin)
					<a href="{{route('DeleteStoryF',['id'=>$blog->id])}}">Delete</a> 
				@endif
			@endif
			@if(Session::get('user_id')!=$blog->user_id)
			<a href="{{route('SubmitReport',['id'=>$blog->id])}}">Report</a> 
			@endif
		</div>
	</div>
</div>
<div class="col-md-9 top-right">
	<div class="content">
		<div class="grids">
			<div class="grid box">
			
				<div class="grid-header">
					
					<h3>{{$blog->title}}</h3>
					<ul>
						<li><span>Posted By <strong>{{$users->where('id',$blog->user_id)->first()->name}}</strong> <span>{{$blog->created_at}}</span>
						</span></li>
					</ul>
				</div>
				<div class="singlepage">
					<p class="sng">
						{{$blog->story}}
					</p>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		@foreach($comments as $comment)
		<div class="comments-main">
			
			<div class="col-md-10 cmts-main-right">
			
				<h5>{{$users->where('id',$comment->user_id)->first()->name}}</h5>
				<p>{{$comment->comment}}</p>
				<div class="cmts">
					<div class="cmnts-left">
						<p>{{$comment->created_at}}</p>
					</div>
					
					<div class="cmnts-left">
						@if(Session::get('user_id') == $comment->user_id || Session::get('user_id') == $blog->user_id )
							<a href="{{route('DeleteComment',['id'=>$comment->id])}}" style="color:blue">Delete</a>
						@endif
						@if(Session::get('user_id') == $comment->user_id)
							<a href="{{route('EditComment',['bid'=>$blog->id,'id'=>$comment->id])}}" style="color:blue">Edit</a>
						@endif
					</div>

					<div class="clearfix"></div>
				</div>
			</div>
			
			<div class="clearfix"></div>
		</div>
		@endforeach
		<div class="row">
			<div class="col-md-10 text text-center">
				{{$comments->links()}}
			</div>
		</div>
	</div>
	<div class="lev">
		<div class="leave">
			<h4>Leave a comment</h4>
		</div>
		{{Form::open(['route'=>'comment','method'=>'Post','id'=>'commentform'])}}
		 <label
				for="comment">Comment</label>
			<textarea name="comment"></textarea>
			@if($errors->has('comment'))
				<span class="text text-danger">Can't be empty</span>
			@endif
			<input type="hidden" name="blog_id" value="{{$blog->id}}">

			<div class="clearfix"></div>
			<input name="submit" type="submit" id="submit" value="Send">
			<div class="clearfix"></div>
		{{Form::close()}}
	</div>

	<div class="clearfix"></div>

</div>

@endsection