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
				@foreach($products as $product)
			<?php $i++ ?>
			<tr>
				<td>{{ $i }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->price }}Tk</td>
				<td>{{ $product->quantity }} pc</td>
				
				<td>
					<div class="table-actions">
						<a href="{{ route('product.sell', ['id' => $product->id, 'quantity' => 1]) }}">Sell </a>
						<a href="{{ route('product.edit', $product->id) }}" data-color="#265ed7"
							><i class="icon-copy dw dw-edit2"></i
						></a>
						<form action="{{ route('product.destroy', $product->id) }}" method="post">
                            @method("DELETE")
                            @csrf

                            <button type="submit" onclick="return confirm('Are you sure?')" data-color="#e95959" data-toggle="tooltip" data-placement="top" title="Delete Product"><i class="icon-copy dw dw-delete-3"></i></button>
                        </form>

						
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection

	