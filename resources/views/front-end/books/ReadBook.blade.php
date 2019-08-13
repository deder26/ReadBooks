
@extends('front-end.master') 

@section('title')
<title>Books</title>
@endsection

@section('content')
<div class="col-md-9 top-right">
<div class="text text-center">
	<iframe src="{{asset($book->book)}}" height="720px" width="100%"></iframe>
</div>
</div>
@endsection