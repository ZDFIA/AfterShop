<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(url('home')); ?> " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('home')); ?> ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo e($item->name); ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-3 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?php echo e(url('uploads')); ?>\<?php echo e($item->image); ?>" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2><?php echo e($item->name); ?></h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp <?php echo e(number_format($item->price)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td><?php echo e($item->stock); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><?php echo e($item->information); ?></td>
                                    </tr>

                                    <tr>
                                        <form action="<?php echo e(url('order')); ?>/<?php echo e($item->id); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <td><label for="total_order">Jumlah Pesan</label></td>
                                            <td>:</td>
                                            <td>
                                                <input type="text" name="total_order" id="total_order" class="form-control" required>
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fas fa-shopping-cart"></i> Beli</button>
                                            </td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/order/home.blade.php ENDPATH**/ ?>