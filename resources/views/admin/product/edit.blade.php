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
                <form name="frmEditProduct" action="{!! route('admin.product.getEdit', $product["id"]) !!}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cate_id">
                            <option value="">Please Choose Category</option>
                            {!! cate_parent($cate, 0, "--", $product['cate_id']) !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" name="name" placeholder="Please Enter Username" value="{!! old('name', isset($product) ? $product['name'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price" value="{!! old('price', isset($product) ? $product['price'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Intro</label>
                        <textarea class="form-control" rows="3" name="intro">{!! old('intro', isset($product) ? $product['intro'] : NULL) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="content">{!! old('content', isset($product) ? $product['content'] : NULL) !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image" value="{!! old('image') !!}">
                    </div>
                    <div class="form-group">
                        <label>Image Preview</label>
                        <div class="image_preview">
                            <img src="{!! asset('resources/upload/'.$product['image']) !!}" alt="">
                        </div>
                        <input type="hidden" name="img_current" value="{!! $product['image'] !!}">
                    </div>
                    <div class="form-group">
                        <label>Product Keywords</label>
                        <input class="form-control" name="keywords" placeholder="Please Enter Category Keywords" value="{!! old('keywords', isset($product) ? $product['keywords'] : NULL) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Product Description</label>
                        <textarea class="form-control" rows="3" name="description">{!! old('description', isset($product) ? $product['description'] : NULL) !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Product Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
            @if ($product_image)
                @foreach($product_image as $key => $image)
                    <div class="form-group" id="{!! $image['id'] !!}">
                        <div class="image_preview">
                            <img image_id="{!! $image['id'] !!}" src="{!! asset('resources/upload/detail/'.$image['image']) !!}" alt="">
                            <a href="javascript:void(0)" class="btn btn-danger btn-circle btn-del-img"><i class="fa fa-times"></i></a>
                        </div>
                        <br/>
                    </div>
                @endforeach
                <button type="button" class="btn btn-primary" id="btn-add-img">Add Images</button>
                <div id="add_images"></div>
            @else
                @for ($i = 1; $i <= 10; $i++)
                    <div class="form-group">
                        <label for="">Image Product Detail {!! $i !!}</label>
                        <input type="file" name="fProductDetail[]">
                    </div>
                @endfor
            @endif
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
    ckeditor('intro');
    ckeditor('content');
</script>
@endsection