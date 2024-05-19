<?php $__env->startSection('container'); ?>
<a href="/makanan/create" class="btn btn-primary mt-3">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Makanan</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php $no = 0; ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $no++ ?>
        <tr>
            <th scope="row"><?php echo e($no); ?></th>
            <td><?php echo e($item->nama_makanan); ?></td>
            <td><?php echo e($item->harga); ?></td>
            <td><img src='<?php echo e(url("/daftar-gambar/$item->gambar")); ?>' width="50" height="50"></img></td>
            <td>
                <!-- Anda bisa menambahkan aksi edit dan hapus di sini jika diinginkan -->
                <a href="<?php echo e(route('makanan.edit', $item->id)); ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                <form action="<?php echo e(route('makanan.destroy', $item->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<!-- Tombol Tambah Data di luar loop -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/makanan/index.blade.php ENDPATH**/ ?>