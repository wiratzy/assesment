<?php $__env->startSection('container'); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($item->id); ?></th>
            <td><?php echo e($item->nama_makanan); ?></td>
            <td><?php echo e($item->harga); ?></td>
            <td><img src='<?php echo e(url("/public/menu-images/$item->image")); ?>'></img></td>
            <td>
                <!-- Anda bisa menambahkan aksi edit dan hapus di sini jika diinginkan -->
                <a href="/crud/<?php echo e($item->id); ?>/edit" class="btn btn-primary">Edit</a>
                <form action="/crud/<?php echo e($item->id); ?>/destroy" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-secondary">Remove</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<!-- Tombol Tambah Data di luar loop -->
<a href="/crud/create" class="btn btn-primary mt-3">Tambah Data</a>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/crud/index.blade.php ENDPATH**/ ?>