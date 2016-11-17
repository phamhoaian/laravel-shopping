@extends('admin.master')

@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Category
					<small>Add</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<div class="col-lg-7" style="padding-bottom:120px">
				@include('admin.blocks.error')
				<form action="{!! route('admin.cate.getAdd') !!}" method="POST">
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<div class="form-group">
						<label>Category Parent</label>
						<select class="form-control" name="sltCateParent">
							<option value="0">Please Choose Category</option>
							{!! cate_parent($parent) !!}
						</select>
					</div>
					<div class="form-group">
						<label>Category Name</label>
						<input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
					</div>
					<div class="form-group">
						<label>Category Order</label>
						<input class="form-control" name="txtOrder" placeholder="Please Enter Category Order" />
					</div>
					<div class="form-group">
						<label>Category Keywords</label>
						<input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" />
					</div>
					<div class="form-group">
						<label>Category Description</label>
						<textarea name="txtDescription" class="form-control" rows="3"></textarea>
					</div>
					<button type="submit" class="btn btn-default">Category Add</button>
					<button type="reset" class="btn btn-default">Reset</button>
				<form>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection