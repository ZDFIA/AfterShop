<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(url('/')); ?> " class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('/')); ?> ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Barang</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-box-open"></i> Data Barang</h3>
                    <a href="<?php echo e(url('item/add')); ?>" class="btn btn-primary mt-2"><i class="fas fa-plus-square"></i> Tambah Barang</a>
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><img src="<?php echo e(url('uploads')); ?>/<?php echo e($item->image); ?>" alt="" width="100"></td>
                                <td><?php echo e($item->name); ?></td>
                                <td>Rp <?php echo e(number_format($item->price)); ?></td>
                                <td><?php echo e($item->stock); ?></td>
                                <td>
                                    <form action="<?php echo e(url('item')); ?>/<?php echo e($item->id); ?>" method="post">
                                        <?php echo method_field('DELETE'); ?>
                                        <?php echo csrf_field(); ?>
                                        <a href="<?php echo e(url('item/detail')); ?>/<?php echo e($item->id); ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                        <a href="<?php echo e(url('item/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a>
                                        <button type="submit" class="btn btn-danger btn" onclick="return confirm('Anda Yakin Akan Menghapus Pengguna Ini ?')"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/admin/item/home.blade.php ENDPATH**/ ?>