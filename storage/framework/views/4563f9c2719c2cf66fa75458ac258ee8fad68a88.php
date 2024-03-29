<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(route('home')); ?> " class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(route('home')); ?> ">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fas fa-user"></i> Data Pengguna</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>No.Hp</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no++); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td>
                                    <?php if(!empty($user->hp)): ?>
                                        <?php echo e($user->hp); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form action="<?php echo e(url('user/status')); ?>/<?php echo e($user->id); ?>" method="get">
                                        <?php echo csrf_field(); ?>
                                        <input class="form-control" type="hidden" name="id" value="<?php echo e($user->name); ?>">
                                        <select name="status" id="status" class="form-control">
                                            <?php if($user->status == 1): ?>
                                                <option value="1">Admin</option>
                                                <option value="0">User</option>
                                            <?php else: ?>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            <?php endif; ?>
                                        </select>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="<?php echo e(url('user')); ?>/<?php echo e($user->id); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <a href="<?php echo e(url('user')); ?>/<?php echo e($user->id); ?>" class="btn btn-primary"><i class="fas fa-info-circle"></i> Detail</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Anda Yakin Akan Menghapus Pengguna Ini ?')"><i class="fa fa-trash"></i></button>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/admin/user/home.blade.php ENDPATH**/ ?>