@extends('front-end.master') 

@section('title')
<title>About Us</title>
@endsection

@section('content')

<div class="row">
	<br>
	<br>
	<br>
	<br>
	<div class="col-md-8 well">
	<table class="table table-bordered">
		<tr>
		<th class="text text-center">{{$about->desscription}}<th>
		</tr>
		
	</table>
	</div>
	<br>
	<br>
	<br>
	<br>
</div>

@endsection