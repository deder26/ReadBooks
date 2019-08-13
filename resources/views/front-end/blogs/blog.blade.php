@extends('front-end.master') 

@section('title')
<title>Blog</title>
@endsection

@section('content')
@if(Session::get('user_id'))
	<a href="{{route('Viewblogs')}}" style="padding:2px">All Stories</a><a href="{{route('ViewMyBlogs')}}" style="padding:2px">My Stories</a>
@endif
<br>
<br>
<div class="col-md-9">
	<div class="content">
		<div class="grids">
		@foreach($blogs as $blog)
			<div class="grid box">
				<div class="grid-header">
					<h3>
						<a href="{{route('SingleViewStory',['id'=>$blog->id])}}">{{$blog->title}} </a>
					</h3>
					<ul>
						<li><span>Posted By <strong>{{$users->where('id',$blog->user_id)->first()->name}}</strong> on 
								<span>{{$blog->created_at}}</span>
						</span></li>

					</ul>
				</div>
				<div class="grid-img-content">
					{{str_limit($blog->story,200)}}
					<?php 
					$l = strlen($blog->story);
					?>
					@if($l >200)
						<a href="{{route('SingleViewStory',['id'=>$blog->id])}}">...</a>
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="comments">
					<ul>
						
						<li><a class="readmore" href="{{route('SingleViewStory',['id'=>$blog->id])}}">ReadMore</a></li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection