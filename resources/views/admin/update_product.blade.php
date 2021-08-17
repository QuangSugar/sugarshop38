@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật sản phẩm
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		echo "<div class='alert alert-success' role='alert'>".$message."</div>";
		Session::put('message',null);
	}
	?>
     @foreach ($update_product as $key => $product)
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/edit-product/'.$product->product_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input name="product_name" value="{{$product->product_name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea  style="resize: none ;"  rows = 5 name="product_desc" class="form-control" id="exampleInputPassword1">{{$product->product_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea style="resize: none ;"  rows = 5 name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả...">{{$product->product_content}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input name="product_image" type="file" class="form-control" id="exampleInputEmail1" >
                            <br>
                                <img width="100" height="100" src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input name="product_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm..." value="{{$product->product_price}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                            <select name="category" class="form-control input-sm m-bot15">
                                @foreach ($category as $key => $value)
                                @if ($product->category_id == $value->category_id)
                                <option selected value="{{$value->category_id}}">{{$value->category_name}}</option>
                                @else
                                <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="brand" class="form-control input-sm m-bot15">
                                @foreach ($brand as $key => $value)
                                @if ($product->brand_id == $value->brand_id)
                                <option selected value="{{$value->brand_id}}">{{$value->brand_name}}</option>
                                @else
                                <option value="{{$value->brand_id}}">{{$value->brand_name}}</option>
                                @endif
                                @endforeach
                            </select>
                            </div>
                            <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        </div>

                    </div>
                    @endforeach
                </section>

        </div>
    </div>
</div>
@endsection