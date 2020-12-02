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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card-body">
                <h3><i class="fas fa-shopping-cart"></i> Check Out</h3>
                <?php if(!empty($order)): ?>
                    <p align="right">Tanggal Pesan : <?php echo e($order->date); ?></p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($order_detail->item->name); ?></td>
                                <td><?php echo e($order_detail->total); ?></td>
                                <td>Rp <?php echo e(number_format($order_detail->item->price)); ?></td>
                                <td>Rp <?php echo e(number_format($order_detail->total_price)); ?></td>
                                <td>
                                    <form action="<?php echo e(url('check-out')); ?>/<?php echo e($order_detail->id); ?>" method="post">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Barang ini ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td colspan="4" align="right"><strong>Total Harga</strong></td>
                            <td><strong>Rp <?php echo e(number_format($order->total_price)); ?></strong></td>
                            <td>
                                <a href="<?php echo e(url('check-out/confirm')); ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin Akan Check Out ?')"><i class="fas fa-shopping-cart"></i> Check Out</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/order/check-out.blade.php ENDPATH**/ ?>