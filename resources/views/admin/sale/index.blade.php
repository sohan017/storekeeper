@extends('layouts.admin')

@section('title', "Product")

@section('content')


<div class="card-box pb-10">
	<div class="h5 pd-20 mb-0">
		<a type="" class="btn btn-info btn-round" href="{{ route('product.create') }}">Create Product</a>
		<p>Product List</p>
		
	</div>
	
	<table class="data-table table nowrap">
		<thead>
			<tr>
				<th class="table-plus">#No</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th class="datatable-nosort">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0 ?>
            @foreach($sales as $sale)
			<?php $i++ ?>
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $sale->product->name }}</td>
				<td>{{ $sale->quantity_sold }}pc</td>
				<td>{{ $sale->created_at }} </td>
				
				<td>
					<div class="table-actions">
						<a href="{{ route('product.edit', $product->id) }}" data-color="#265ed7"
							><i class="icon-copy dw dw-edit2"></i
						></a>
						
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection

	