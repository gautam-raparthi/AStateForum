@extends('templates.default')

@section('content')
	<div class="row">
		<div class="col-lg-5">
			<!-- User information and status -->
			@include('user.partials.userblock')

			<hr>
			<!-- <img class="media-object" alt="ujui" src="/images/B5.jpg"  height="42" width="42"> -->
		</div>
		<div class="col-lg-4 col-lg-offset-3">
			<!-- Friend , Friend request -->
		</div>
	</div>
@stop