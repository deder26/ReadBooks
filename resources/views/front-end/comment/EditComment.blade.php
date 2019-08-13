@extends('front-end.master') 

@section('title')
<title>{{$blog->title}}</title>
@endsection 

@section('content')

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
	</div>
	<div class="lev">
		<div class="leave">
			<h4>Leave a comment</h4>
		</div>
		{{Form::open(['route'=>'UpdateComment','method'=>'Post','id'=>'commentform'])}}
		 <label
				for="comment">Comment</label>
			<textarea name="comment">{{$comment->comment}}</textarea>
			@if($errors->has('comment'))
				<span class="text text-danger">Can't be empty</span>
			@endif
			<input type="hidden" name="blog_id" value="{{$blog->id}}">
						<input type="hidden" name="id" value="{{$comment->id}}">
			<div class="clearfix"></div>
			<input name="submit" type="submit" id="submit" value="Send">
			<div class="clearfix"></div>
		{{Form::close()}}
	</div>

	<div class="clearfix"></div>

</div>

@endsection