
<?php $__env->startSection('admin_content'); ?>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Responsive Table
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
                <?php $message = Session::get('message'); 
                if ($message) {
                    echo "<span class='text-alert'>$message</span>";
                    Session::put('message', null); 
                }
                ?>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th>Ngày thêm</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                        <td><?php echo e($value->category_name); ?></td>
                        <td><span class="text-ellipsis"><?php echo $value->category_status == 0 ? '<a href="'.URL::to('active_category/'.$value->id).'"><span class="fa-thumb-style fa fa-thumbs-down"></span></a>' : '<a href="'.URL::to('unactive_category/'.$value->id).'"><span class="fa-thumb-style fa fa-thumbs-up"></span></a>'; ?></span></td>
                        <td><span class="text-ellipsis">12/2019</span></td>
                        <td>
                            <a href="<?php echo e(URL::to('/edit-category/'.$value->id)); ?>" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a href="<?php echo e(URL::to('/delete-category/'.$value->id)); ?>" onclick="deleteItem(<?php echo e($value->id); ?>)" class="active" ui-toggle-class=""><i class="fa fa-trash text-danger text"></i></a>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    function deleteItem(id) {
        if (confirm('Chắc chắn xóa ?')==true) return true;
        else event.preventDefault();
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\XAMPP_HTDOC\htdocs\Laravel\Website bán hàng Youtube\shopbanhanglaravel\resources\views/admin/all_category.blade.php ENDPATH**/ ?>