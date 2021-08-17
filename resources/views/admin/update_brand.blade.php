@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật thương hiệu sản phẩm
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		echo "<div class='alert alert-success' role='alert'>".$message."</div>";
		Session::put('message',null);
	}
	?>
     @foreach ($update_brand as $key => $brand)
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/edit-brand/'.$brand->brand_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input name="brand_name" value="{{$brand->brand_name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên thương hiệu...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea  style="resize: none ;"  rows = 5 name="brand_desc" class="form-control" id="exampleInputPassword1">{{$brand->brand_desc}}</textarea>
                            </div>
                        
                            <button type="submit" name="update_brand" class="btn btn-info">Cập nhật thương hiệu</button>
                        </form>
                        </div>

                    </div>
                    @endforeach
                </section>

        </div>
    </div>
</div>
@endsection