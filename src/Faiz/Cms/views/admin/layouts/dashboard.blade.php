@extends('cms::admin.layouts.default')

@section('content')
<h1 class="page-header">Dashboard</h1>

<div class="row placeholders" style="margin-bottom:40px;">
	<div class="col-xs-6 col-sm-3 placeholder text-center">
		<img data-src="holder.js/200x200/auto/sky" class="img-responsive img-circle" alt="200x200">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder text-center">
		<img data-src="holder.js/200x200/auto/vine" class="img-responsive img-circle" alt="200x200">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder text-center">
		<img data-src="holder.js/200x200/auto/sky" class="img-responsive img-circle" alt="200x200">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
	<div class="col-xs-6 col-sm-3 placeholder text-center">
		<img data-src="holder.js/200x200/auto/vine" class="img-responsive img-circle" alt="200x200">
		<h4>Label</h4>
		<span class="text-muted">Something else</span>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="panel-title">Section title</h2>
			</div>
			<div class="">
				<div class="table-responsive">
					<table class="table table-striped">
					<thead>
					<tr>
					  <th>#</th>
					  <th>Header</th>
					  <th>Header</th>
					  <th>Header</th>
					  <th>Header</th>
					</tr>
					</thead>
					<tbody>
					<tr>
					  <td>1,001</td>
					  <td>Lorem</td>
					  <td>ipsum</td>
					  <td>dolor</td>
					  <td>sit</td>
					</tr>
					<tr>
					  <td>1,002</td>
					  <td>amet</td>
					  <td>consectetur</td>
					  <td>adipiscing</td>
					  <td>elit</td>
					</tr>
					<tr>
					  <td>1,003</td>
					  <td>Integer</td>
					  <td>nec</td>
					  <td>odio</td>
					  <td>Praesent</td>
					</tr>
					<tr>
					  <td>1,003</td>
					  <td>libero</td>
					  <td>Sed</td>
					  <td>cursus</td>
					  <td>ante</td>
					</tr>
					<tr>
					  <td>1,004</td>
					  <td>dapibus</td>
					  <td>diam</td>
					  <td>Sed</td>
					  <td>nisi</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


@stop

@section('js')
<script src="{{ URL::asset('bootstrap/js/holder.js') }}"></script>