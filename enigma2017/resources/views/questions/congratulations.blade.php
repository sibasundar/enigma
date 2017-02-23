@extends('app')
@section('title')
COMPOSIT 2016
@stop

@section('head')
<style type="text/css">
	.col{
		padding: 20px;
		height: 590px;
	}
</style>
@stop

@section('content')
<div class="containe" style="background-image: url({{ URL::asset('images/congo.jpg') }}); background-size: cover;">
	<div class="row">
		<div class="col s6 offset-s3">
			<p>Congratulations on successfully completing the journey.</p>
			<p>Stay Tuned!
			The results will be out soon.</p>
		</div>
	</div>
</div>	

@stop