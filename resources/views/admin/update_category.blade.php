@extends('admin_layout')
@section('admin_content')
<div class="form-w3layouts">
    <div class="row">
        <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Cập nhật danh mục sản phẩm
                    </header>
                    <?php 
	$message = Session::get('message');
	if($message){
		echo "<div class='alert alert-success' role='alert'>".$message."</div>";
		Session::put('message',null);
	}
	?>
     @foreach ($update_category as $key => $category)
                    <div class="panel-body">
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/edit-category/'.$category->category_id)}}" method="post">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input name="category_name" value="{{$category->category_name}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục...">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả</label>
                                <textarea  style="resize: none ;"  rows = 5 name="category_desc" class="form-control" id="exampleInputPassword1">{{$category->category_desc}}</textarea>
                            </div>
                        
                            <button type="submit" name="update_category" class="btn btn-info">Cập nhật danh mục</button>
                        </form>
                        </div>

                    </div>
                    @endforeach
                </section>

        </div>
    </div>
</div>
@endsection