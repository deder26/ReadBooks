@extends('front-end.master') 

@section('title')
<title>ReadBooks</title>
@endsection


@section('content')
<div class="col-md-9 top-right">
	<div class="welcome">
		<h2>
			<span>Welcome</span> to ReadBooks! Download & read books, articles & share your stories!!
		</h2>
		<div class="welcome-top">
			<div class="col-md-6 welcome-left">
				<div class="view view-tenth">
					<a href="singlepage.html">
						<div class="inner_content clearfix">
							<div class="product_image">
								<img src="images/img5.jpg" class="img-responsive of-my" alt="" />
								<div class="mask">
									<h4>Hand made design</h4>
									<p>Proin gravida nibh vquis bibendum auct, nec sagittis sem
										nibh id elit. Proin gravida nibh vel velit auctor aliquet.
										Aenean sollicitudin</p>
									<h5>Continue reading...</h5>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection