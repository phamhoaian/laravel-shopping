@extends('admin.master')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.blocks.error')
                <form action="{!! route('admin.product.getEdit') !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="sltCate">
                            <option value="">Please Choose Category</option>
                            {!! cate_parent($cate, 0, "--", $product['cate_id']) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{!! old('txtName', isset($product) ? $product['name'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{!! old('txtPrice', isset($product) ? $product['price'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro', isset($product) ? $product['intro'] : NULL) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent', isset($product) ? $product['content'] : NULL) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="fImages" value="{!! old('fImages') !!}">
                    </div>
                    <div class="form-group">
                        <label>Image Preview</label>
                        <div class="image_preview">
                            <img src="{!! asset('resources/upload/'.$product['image']) !!}" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="txtKeywords" placeholder="Please Enter Category Keywords" value="{!! old('txtKeywords', isset($product) ? $product['keywords'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : NULL) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
            @foreach($product_image as $key => $image)
                <div class="form-group">
                    <div class="image_preview">
                        <img src="{!! asset('resources/upload/detail/'.$image['image']) !!}" alt="">
                        <a href="" class="btn btn-danger btn-circle btn-del-img"><i class="fa fa-times"></i></a>
                    </div>
                    <br/>
                    <input type="file" name="fProductDetail[]">
                </div>
            @endforeach
            <button type="button" class="btn btn-primary" id="btn-add-img">Add Images</button>
            <div id="add_images"></div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<style>
    .image_preview {
        width: 300px;
        position: relative;
    }
    .image_preview img {
        max-width: 100%;
    }
    .image_preview .btn-del-img {
        position: absolute;
        top: 10px;
        right: 10px;
    }
</style>
<script type="text/javascript">
    ckeditor('txtIntro');
    ckeditor('txtContent');
    ckeditor('txtDescription');
</script>
@endsection