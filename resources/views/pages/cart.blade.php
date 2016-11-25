@extends('master')

@section('content')
<section id="product">
	<div class="container">
		<!--  breadcrumb -->
		<ul class="breadcrumb">
			<li>
				<a href="#">Home</a>
				<span class="divider">/</span>
			</li>
			<li class="active"> Shopping Cart</li>
		</ul>
		<h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
		<!-- Cart-->
		@if (count($content) > 0)
		<div class="cart-info">
			<form action="" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<table class="table table-striped table-bordered">
					<tr>
						<th class="image">Image</th>
						<th class="name">Product Name</th>
						<th class="quantity">Qty</th>
						<th class="total">Action</th>
						<th class="price">Unit Price</th>
						<th class="total">Total</th>
					</tr>
					@foreach($content as $item)
					<tr>
						<td class="image">
							<a href="#"><img title="product" alt="product" src="{{ asset('resources/upload/'.$item->options->img) }}" height="50" width="50"></a>
						</td>
						<td class="name"><a href="#">{!! $item->name !!}</a></td>
						<td class="quantity">
							<input type="text" size="1" value="{!! $item->qty !!}" name="quantity[]" class="span1 qty">
						</td>
						<td class="total">
							<a href="javascript:void(0)" class="btn-cart-update" id="{!! $item->rowid !!}"><img class="tooltip-test" data-original-title="Update" src="{{ asset('public/front/img/update.png') }}" alt=""></a>
							<a href="{{ url('cart-delete', $item->rowid) }}"><img class="tooltip-test" data-original-title="Remove" src="{{ asset('public/front/img/remove.png') }}" alt=""></a>
						</td>
						<td class="price">{!! number_format($item->price) !!}</td>
						<td class="total">{!! number_format($item->price * $item->qty) !!}</td>
					</tr>
					@endforeach
				</table>
			</form>
		</div>
		<div class="container">
			<div class="pull-right">
				<div class="span4 pull-right">
					<table class="table table-striped table-bordered ">
						<tr>
							<td><span class="extra bold totalamout">Total :</span></td>
							<td><span class="bold totalamout">{!! number_format($total) !!}</span></td>
						</tr>
					</table>
					<input type="submit" value="CheckOut" class="btn btn-orange pull-right">
					<input type="submit" value="Continue Shopping" class="btn btn-orange pull-right mr10">
				</div>
			</div>
		</div>
		@else 
			<p>Cart empty</p>
		@endif
	</div>
</section>
@endsection