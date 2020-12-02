<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
            <img src="<?php echo e(url('images/logo.png')); ?>" class="rounded mx-auto d-block" width="300" alt="">
        </div>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card mt-5">
              <img src="<?php echo e(url('uploads')); ?>/<?php echo e($item->image); ?>" width="100" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo e($item->name); ?></h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. <?php echo e(number_format($item->price)); ?> <br>
                    <strong>Stok :</strong> <?php echo e($item->stock); ?> <br>
                    <hr>
                    <strong>Keterangan :</strong> <br>
                    <?php echo e($item->information); ?>

                </p>
                <a href="<?php echo e(url('order')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Pesan</a>
              </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/home.blade.php ENDPATH**/ ?>