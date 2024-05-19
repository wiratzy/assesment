<?php $__env->startSection('container'); ?>
    <!-- Modal Charge-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Charge</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <h3 class="text-center">Total Charge : Rp <span id="pay_charge"></span></h3>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pay"> Uang Pembeli </label>
                        <input type="text" class="form-control" name="pay" id="pay"
                            placeholder="Masukan Uang Pembeli . . . " required autocomplete="off">
                    </div>
                    <div class="form-group mb-3">
                        <h5 class="text-danger">Kembalian: Rp <span id="kembali">0</span></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="savebill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center">saved</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Daftar Gambar -->
            <div class="col-md-8">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card"
                             onclick='addToCart("<?php echo e($menu->id); ?>", "<?php echo e($menu->nama_makanan); ?>", <?php echo e($menu->harga); ?>)'
                             style="cursor: pointer; width: 200px; height:200px; " >
                            <div class="overflow-hidden">
                                <img src='<?php echo e(url("/daftar-gambar/$menu->gambar")); ?>' style="objec-fit: cover; width: 100%; height: 100;" alt="thumbnail for <?php echo e($menu->nama_makanan); ?>">
                            </div>
                            <h3 class="card-text"><?php echo e($menu->nama_makanan); ?></h3>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- Tabel Invoice -->
            <div class="col-md-4">
                <div class="card invoice-table">
                    <div class="card-header" style="background-color: #e3e6f3">
                        <div class="float-start">
                            <i class="fa fa-user-circle" style="font-size: 35px"></i>
                            <br>
                            Customer
                        </div>
                        <div class="float-end">
                            <i class="fas fa-list" style="font-size: 35px"></i>
                            <br>
                            Billing List
                        </div>
                        <div class="mt-2">
                            <h1 style="font-weight: bold;">New Customer</h1>
                        </div>
                    </div>
                    <div class="card-body" id="section-to-print">
                        <table class="table table-hover">
                            <tr>
                                <td class="text-center">
                                    <h3>Dine In <i class="text-primary fas fa-chevron-down" style="font-size: 20px;"></i></h3>
                                </td>
                            </tr>
                        </table>
                        <table class="table" style="border: 0px solid #fff;" id="bill">
                            <tr>
                                <td width="40%" align="left">1.</td>
                                <td width="20%"></td>
                                <td width="40%" align="right">View Table</td>
                            </tr>
                            <tbody id="list-menu">

                            </tbody>
                            <tr>
                                <td width="50%" align="left">Sub Total :</td>
                                <td width="20%" align="right"> </td>
                                <td width="30%" align="right" id="subtotal">0</td>
                            </tr>
                            <tr>
                                <td width="50%" align="left">Total :</td>
                                <td width="20%" align="right"> </td>
                                <td width="30%" align="right" id="total">0</td>
                            </tr>
                        </table>
                    </div>
                    <table class="table table-hover" style="border-top: 1px solid #e3e6f3;font-size: 20px">
                        <tr>
                            <td class="text-center">
                                <button class="btn bg-white btn-light text-danger border-0" onclick="location.reload()">Clear Sale</button>
                            </td>
                        </tr>
                    </table>
                    <div class="card-footer m-0 p-0">
                        <div>
                            <button type="button" class="btn border-0 me-1 btn-secondary text-dark btn-lg float-start"
                                    style="border-radius: 0; width: 49%; background-color: #e3e6f3;" data-bs-toggle="modal"
                                    data-bs-target="#savebill">Save Bill</button>
                            <button type="button" class="btn border-0 btn-secondary text-dark btn-lg float-end"
                                    style="border-radius: 0; width: 50%; background-color: #e3e6f3" id="print">Print Bill</button>
                        </div>
                        <div style="height: 75px">
                            <button type="button" class="btn border-0 btn-primary text-white btn-lg float-start"
                                    style="border-radius: 0;width: 13%;">
                                <i class="fas fa-money-bill-wave-alt float-start ms-1" style="font-size: 30px;"></i>
                                <br>
                                Sale
                            </button>
                            <button type="button" class="btn border-0 text-white btn-primary btn-lg float-end"
                                    style="border-radius: 0;width: 86%; height: 100%;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                Charge Rp <span id="charge">0</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/kasir/index.blade.php ENDPATH**/ ?>