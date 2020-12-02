<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(url('history')); ?> " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('home')); ?> ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('history')); ?> ">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheckout, selanjutnya untuk pembayaran silahkan transfer ke <strong>Bank BNI Nomer Rekening : 0733967372</strong> dengan nominal : <strong>Rp <?php echo e(number_format($order->total_price + $order->code)); ?></strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fas fa-info-circle"></i> Detail Pemesanan</h3>
                    <?php if(!empty($order)): ?>
                        <p align="right">Tanggal Pesan : <?php echo e($order->date); ?></p>
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td align="left"><?php echo e($order_detail->item->name); ?></td>
                                    <td><?php echo e($order_detail->total); ?></td>
                                    <td>Rp <?php echo e(number_format($order_detail->item->price)); ?></td>
                                    <td>Rp <?php echo e(number_format($order_detail->total_price)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp <?php echo e(number_format($order->total_price)); ?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp <?php echo e(number_format($order->code)); ?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga yang Harus Dibayar :</strong></td>
                                <td align="right"><strong>Rp <?php echo e(number_format($order->total_price + $order->code)); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/history/detail.blade.php ENDPATH**/ ?>