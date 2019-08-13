@extends('front-end.master') 

@section('title')
<title>Books</title>
@endsection

@section('content')
<div class="row">
	
	@foreach($books as $book)
	<div class="col-md-2">
		<table border="1" height="250px">
			<tr>
				<td align="center" style="padding: 10px">
					<a href="{{route('ReadBook',['id'=>$book->id])}}" title="Read This Book">
						<img src="{{asset($book->coverPic)}}" height="100px" width="80px" />
					</a>
				  <p align="center" style="padding: 5px">
						<strong style="font-size: 10px">{{$book->title}}</strong><br>
					 <a href="{{route('ReadBook',['id'=>$book->id])}}">
				 		<input class="btn btn-success" type="button" value="Read" title="Read This Book" align="center" style="padding: 5px">
				 	</a>
				  </p>
				</td>
			</tr>
		</table>
	</div>
	@endforeach
	<div class="row">
				<div class="col-md-12 text-center">
					{{$books->links()}}
				</div>
			</div>
</div>
@endsection