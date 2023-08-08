@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa danh mục sản phẩm
            </header>            
            <div class="panel-body">
                <?php $message = Session::get('message'); 
                if ($message) {
                    echo "<span class='text-alert'>$message</span>";
                    Session::put('message', null); 
                }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$data->id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="category_name">Tên danh mục</label>
                            <input name="category_name" type="text" class="form-control" id="category_name" placeholder="Enter email" value="{!! $data->category_name !!}">
                        </div>
                        <div class="form-group">
                            <label for="category_desc">Mô tả danh mục</label>
                            <textarea name="category_desc" style="resize: none" type="text" rows="4" class="form-control" id="category_desc" placeholder="Password" > {!! $data->category_desc !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Xác nhận</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection