@extends('templates.main')
<style>

	.wrapper section>h2::before{
		width: 190px !important;
		left: 42% !important;
	}
	thead{
		background-color: #00E660;
	}

	.filter{
		font-size: 16px;
	}
</style>
@section('content')
<div class="container">
	<section>
		<h2 style="margin-top: 0px;">Waiting for you to pick up!</h2>
		<p>Here we list out the food's contributed by our user's and partner's.We make sure that these items comply strictly with our standard terms and policies.
			<br> All the food's that is not collected within the user specified time is automatically deleted to avoid any complications.</p>
	</section>
	<div class="col-lg-12 plr-0 filter" style="border: 1px solid red">
		<div class="row">
			<div class="col-lg-6 form-group">
				<label for="">Location</label>
				<input type="text" class="form-control" name="" id="" placeholder="City">
				<input type="text" class="form-control" name="" id="" placeholder="Country">
			</div>
	
			<div class="col-lg-6">
				<label for="">Food Count</label>
				<input type="text" name="" id="" placeholder="Food Count">
			</div>
		</div>

		<div>
			<label for="">Time</label>
			<select name="" id="">
				<option value="">Less than 1 hour</option>
			</select>
		</div>

		<div>
			<label for="">Veg</label>
			<input type="radio" >
			<label for="">Non Veg</label>
			<input type="radio">
		</div>

		<div>
			<label for="">Restaurent</label>
			<input type="radio">
			<label for="">Event</label>
			<input type="radio">
		</div>

	</div>

	<table class="table">
		<thead class="table-striped">
			<tr>
				<th scope="col">First</th>
				<th scope="col">Last</th>
				<th scope="col">Handle</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<td>Larry</td>
				<td>the Bird</td>
				<td>@twitter</td>
			</tr>
		</tbody>
	</table>
</div>
@stop