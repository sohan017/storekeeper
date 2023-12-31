@extends('layouts.admin')

@section('title', "Sale Product")

@section('content')


<div class="card-box pb-10">
	<div class="h5 pd-20 mb-0">
		<p>Product Sale List</p>
		
	</div>
	
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus">#No</th>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th class="datatable-nosort">Date</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0 ?>
            @foreach($sales as $sale)
			<?php $i++ ?>
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $sale->product->name }}</td>
				<td>{{ $sale->product->price }}</td>
				<td>{{ $sale->quantity_sold }}pc</td>
				<td>{{ $sale->created_at }} </td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection

	