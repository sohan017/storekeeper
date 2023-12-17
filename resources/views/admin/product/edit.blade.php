@extends('layouts.admin')

@section('title', "Product")

@section('content')

<div class="title pb-20">
	<h2 class="h3 mb-0">Create New Product</h2>
</div>

<div class="pd-20 card-box mb-30">
	<div class="clearfix">
		<div class="pull-left">
			<h4 class="text-blue h4">Create New Product</h4>
		</div>
		<div class="pull-right">
			<a
			href="{{ route('product.create') }}"
			class="btn btn-primary btn-sm scroll-click"
			rel="content-y"
			data-toggle="collapse"
			role="button"
			><i class="fa fa-plus"></i>Create New Product</a
			>
		</div>
	</div>
	<form  method="post" action="{{ route('product.update', $product->id) }}">
		@csrf
        @method("PUT")
		<div class="form-group">

			<label>Product Name <span style="color: red">*</span></label>
			<input
			name="name"
			class="form-control @error('name') is-invalid @enderror"
            value="{{ $product->name }}"
			type="text"
			placeholder="Procuct Name"
			/>
			@error('name')
				<small class="invalid-feedback">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-group">
			<label>Product Price <span style="color: red">*</span></label>
			<input
			name="price"
			class="form-control @error('price') is-invalid @enderror"
            value="{{ $product->price }}"
			type="number"
			placeholder="Procuct Price"
			/>
			@error('price')
				<small class="invalid-feedback">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-group">
			<label>Product Quantity <span style="color: red">*</span></label>
			<input
			name="quantity"
			class="form-control @error('quantity') is-invalid @enderror"
            value="{{ $product->quantity }}"
			type="number"
			placeholder="Procuct Quantity"
			/>
			@error('quantity')
				<small class="invalid-feedback">{{ $message }}</small>
			@enderror
		</div>
		<div class="form-group">
			<button class="btn btn-secondary" type="submit">Save</button>
		</div>
		
	</form>
</div>

@endsection


