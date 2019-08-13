@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Users Reports About Blog Stories</h4>
		</div>
		<div class="panel-body">
			@if(Session::has('message'))
			<div class="alert alert-success">
				<strong class="text-center">{{ Session::get('message')}}</strong>
			</div>
			@endif
			<table class="table table-bordered">
				<tr class="bg-primary">
					<th>SL NO.</th>
					<th>Reported By</th>
					<th>Story's title</th>
					<th>Story's Author Name</th>
					
					<th>Story</th>
					<th>Action</th>
				</tr>
				@php($i=1)
				@foreach($reports as $report)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $users->where('id',$report->reportBy_user_id)->first()->name}}</td>
					<td>{{$report->title}}</td>
					<td>{{ $users->where('id',$report->user_id)->first()->name}}</td>
					<td>{{ str_limit($report->story,100)}}....</td>
					<td><a
						href="{{route('ViewReportedStory',['id'=>$report->blog_id])}}"
						class="btn btn-success btn-xs"> <span
							class="glyphicon glyphicon-edit" title="View Story"></span>
					</a> <a
						href="{{route('DeleteReport',['id'=>$report->id])}}"
						class="btn btn-danger btn-xs"
						onclick="return confirm('Are you sure!!!')" title="Remove this report"> <span
							class="glyphicon glyphicon-trash"></span>
					</a></td>
				</tr>
				@endforeach

			</table>
				<div class="row">
				<div class="col-md-12 text-center">
					{{$reports->links()}}
				</div>
			</di
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br> 
	@endfor
@endsection