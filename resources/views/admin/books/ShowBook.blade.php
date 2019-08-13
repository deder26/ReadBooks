
@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')
<div class="text text-center">
	<iframe src="{{asset($book->book)}}" height="720px" width="100%"></iframe>
</div>


@endsection