<?php $__env->startSection('container'); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Gambar</th>
            <th scope="col">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="submit" class="btn btn-secondary">Remove</button>
            </th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/crud.blade.php ENDPATH**/ ?>