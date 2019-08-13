@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<h4 class="text-center text-success">Manage Catagory Form</h4>
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
					<th>Catagory Name</th>
					<th>Book Name</th>
					<th>Author Name</th>
					<th>Cover Picture</th>
					<th>Book</th>
					<th>Action</th>
				</tr>
				@php($i=1)
				@foreach($books as $book)
				<tr>
					<td>{{$i++}}</td>
					<td>{{ $book->name}}</td>
					<td>{{ $book->title}}</td>
					<td>{{ $book->author}}</td>
					<td><img src="{{ asset($book->coverPic) }}" alt="" height="100" width="80"></td>
					<td><a href="{{route('ShowBook',['id'=>$book->id])}}" title="Show Pdf"><img src="{{ asset('/')}}front/images/pdf.png" alt="" height="100" width="80"></a></td>
					<td><a
						href="{{route('BookEdit',['id'=>$book->id])}}"
						class="btn btn-success btn-xs"> <span
							class="glyphicon glyphicon-edit" title="Edit"></span>
					</a> <a
						href="{{route('BookDelete',['id'=>$book->id])}}"
						class="btn btn-danger btn-xs"
						onclick="return confirm('Are you sure!!!')" title="Delete"> <span
							class="glyphicon glyphicon-trash"></span>
					</a></td>
				</tr>
				@endforeach

			</table>
				<div class="row">
				<div class="col-md-12 text-center">
					{{$books->links()}}
				</div>
			</di
		</div>
	</div>
</div>
	@for($i = 0; $i < 11; $i++) 
		<br> 
	@endfor
@endsection