@extends('admin.dashboard.DashboardAdmin')

@section('dashcontent')

<!--inner block start here-->

<!--market updates updates-->
<div class="market-updates">
<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-8 market-update-left">
				<h3>{{$cnt}}</h3>
				<h4>Registered User</h4>
				
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<br>
	<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-8 market-update-left">
				<h3>{{$cntBook}}</h3>
				<h4>Total Books</h4>
				
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<br>
	<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-8 market-update-left">
				<h3>{{$cntBlog}}</h3>
				<h4>Total Blogs</h4>
				
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-file-text-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<br>
	<div class="row">
	<div class="col-md-8 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-8 market-update-left">
				<h3>{{$cntMsg}}</h3>
				<h4>New Messages</h4>
			</div>
			<div class="col-md-4 market-update-right">
				<i class="fa fa-envelope-o"> </i>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</div>
	<div class="clearfix"></div>
</div>
@for($i=0;$i<20;$i++)
	<br>
@endfor

@endsection

