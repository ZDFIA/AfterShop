<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(url('user')); ?> " class="btn btn-primary"><i class="fas fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('/')); ?> ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('user')); ?> ">Data Pengguna</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail User (<?php echo e($user->name); ?>)</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                <h4><i class="fa fa-user"></i> Detail User (<?php echo e($user->name); ?>)</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td width="10">:</td>
                            <td><?php echo e($user->name); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td><?php echo e($user->hp); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?php echo e($user->address); ?></td>
                        </tr>
                    </tbody>
                </table>
               </div>
           </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/admin/user/detail.blade.php ENDPATH**/ ?>