<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href=" <?php echo e(url('item')); ?> " class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('/')); ?> ">Home</a></li>
                    <li class="breadcrumb-item"><a href=" <?php echo e(url('item')); ?> ">Data Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Barang (<?php echo e($item->name); ?>)</li>
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
                            <h2><i class="fas fa-box-open"></i> Detail Barang (<?php echo e($item->name); ?>)</h2>
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
                                        <td></td>
                                        <td></td>
                                        <td><a href="<?php echo e(url('item/edit')); ?>/<?php echo e($item->id); ?>" class="btn btn-success"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-body">
                    <h4><i class="fas fa-pen-alt"></i> Edit Detail Barang</h4>
                     <form method="POST" action="<?php echo e(url('item/detail')); ?>/<?php echo e($item->id); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row">
                             <label for="name" class="col-md-2 col-form-label text-md-right">Nama</label>
                             <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($item->name); ?>" required autocomplete="name" autofocus>
                                 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <span class="invalid-feedback" role="alert">
                                         <strong><?php echo e($message); ?></strong>
                                     </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="price" class="col-md-2 col-form-label text-md-right">Harga</label>
                             <div class="col-md-6">
                                 <input id="price" type="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price" value="<?php echo e($item->price); ?>" required autocomplete="price">
                                 <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <span class="invalid-feedback" role="alert">
                                         <strong><?php echo e($message); ?></strong>
                                     </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="stock" class="col-md-2 col-form-label text-md-right">Stok</label>
                             <div class="col-md-6">
                                 <input id="stock" type="text" class="form-control <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="stock" value="<?php echo e($item->stock); ?>" required autocomplete="stock">
                                 <?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <span class="invalid-feedback" role="alert">
                                         <strong><?php echo e($message); ?></strong>
                                     </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="information" class="col-md-2 col-form-label text-md-right">Keterangan</label>
                             <div class="col-md-6">
                                 <textarea name="information" class="form-control" <?php $__errorArgs = ['information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($item->information); ?>"</textarea>
                                 <?php $__errorArgs = ['information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <span class="invalid-feedback" role="alert">
                                         <strong><?php echo e($message); ?></strong>
                                     </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="image" class="col-md-2 col-form-label text-md-right">Gambar</label>
                             <div class="col-md-6">
                                 <input id="image" type="file" class="form-control-file" <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="image" required>
                                 <?php $__errorArgs = ['information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <span class="invalid-feedback" role="alert">
                                         <strong><?php echo e($message); ?></strong>
                                     </span>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                             </div>
                         </div>
                         <div class="form-group row mb-0">
                             <div class="col-md-6 offset-md-2">
                                 <button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin Akan Mengubang Detail Barang Ini ?')">Save</button>
                             </div>
                         </div>
                     </form>
                 </div>
            </div>
         </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\toko\resources\views/admin/item/detail.blade.php ENDPATH**/ ?>