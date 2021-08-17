@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm sản phẩm sản phẩm
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		echo "<div class='alert alert-success' role='alert'>".$message."</div>";
		Session::put('message',null);
	}
	?>
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input name="product_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea style="resize: none ;"  rows = 5 name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung</label>
                                <textarea style="resize: none ;"  rows = 5 name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Nhập mô tả..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                                <input name="product_image" type="file" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input name="product_price" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập giá sản phẩm...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục</label>
                            <select name="category" class="form-control input-sm m-bot15">
                                @foreach ($category as $key => $value)
                                <option value="{{$value->category_id}}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="brand" class="form-control input-sm m-bot15">
                                @foreach ($brand as $key => $value)
                                <option value="{{$value->brand_id}}">{{$value->brand_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                        </div>

                    </div>
                </section>

        </div>
    </div>
</div>
@endsection