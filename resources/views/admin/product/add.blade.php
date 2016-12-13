@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.blocks.error')
                <form action="{!! route('admin.product.getAdd') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cate_id">
                            <option value="">Please Choose Category</option>
                            {!! cate_parent($cate, 0, "--", old('cate_id')) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Username" value="{!! old('name') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price" value="{!! old('price') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="intro">{!! old('intro') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="content">{!! old('content') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image" value="{!! old('image') !!}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="keywords" placeholder="Please Enter Category Keywords" value="{!! old('keywords') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="description" id="description">{!! old('description') !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
            @for ($i = 1; $i <= 10; $i++)
                <div class="form-group">
                    <label for="">Image Product Detail {!! $i !!}</label>
                    <input type="file" name="fProductDetail[]">
                </div>
            @endfor
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    ckeditor('intro');
    ckeditor('content');
</script>
@endsection