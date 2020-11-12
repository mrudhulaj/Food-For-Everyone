@extends('templates.main')
<title>Available Foods</title>
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

	.pr-20{
		padding-right: 20px !important;
	}

	.pl-20{
		padding-left: 20px
	}

	.mr-20{
		margin-right: 20px !important;
	}

	.ml-20{
		margin-left: 20px
	}

</style>
@section('content')
<div class="container">
	<section>
		<h2 style="margin-top: 0px;">Waiting for you to pick up!</h2>
		<p>Here we list out the food's contributed by our user's and partner's.We make sure that these items comply strictly with our standard terms and policies.
			<br> All the food's that is not collected within the user specified time is automatically deleted to avoid any complications.</p>
	</section>
	<div class="col-lg-12 plr-0 filter" style="margin-top: 30px;">

		<form class="form-inline">
			<div class="form-group">
				<label for="" class="">Location</label>
				<input type="text" class="form-control pr-20" name="" id="" placeholder="Country">
				<input type="text" class="form-control pr-20" name="" id="" placeholder="City">
			</div>

			<div class="form-group">
				<label for="" class="pl-20">Time</label>
				<select class="form-control" style="width: 188px">
					<option>Less than 1 hour</option>
				</select>
			</div>

			<div class="form-group">
				<label for="" class="pl-20">Food Count</label>
				<input type="text" class="pl-20 form-control" name="" id="" placeholder="Food Count" style="width: 150px">
			</div>

			<div class="form-group">
				<input type="radio" name="vegFlag" id="nonVegFlag">
				<label for="nonVegFlag" class="pl-20">Non Veg</label>
				<input type="radio" name="vegFlag" id="vegFlag">
				<label for="vegFlag" class="pl-20">Veg</label>
			</div>

			{{--  <div class="form-group" style="margin-top: 10px">
				<label for="" class="">Restaurent</label>
				<input type="radio" name="" id="">
				<label for="" class="pl-20">Event</label>
				<input type="radio" name="" id="">
			</div>  --}}

			<div class="col-lg-12" style="text-align: center;margin-top: 20px;margin-bottom: 20px;">
				<button class="btn button-bg-green" style="padding: 0px;width: 100px;height: 40px" type="submit">Filter</button>
			</div>

		</form>

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