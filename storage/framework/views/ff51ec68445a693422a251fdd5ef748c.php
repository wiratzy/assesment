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
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php $__currentLoopData = $datamakanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="card" style="width: 100%; cursor:pointer;"    onclick='addToCart("<?php echo e($item->id); ?>", "<?php echo e($item->nama_makanan); ?>", <?php echo e($item->harga); ?>)'>
                        <img src='<?php echo e(url("/daftar-gambar/$item->gambar")); ?>' class="card-img-top" alt="..." width="50px" height="100px">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($item->nama_makanan); ?></h5>
                            <p class="card-text"><?php echo e($item->harga); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card invoice-table">
                <div class="card-header" style="background-color: #4968f3">
                    <div class="float-start">
                        <i class="bi bi-person-circle " style="font-size:3rem;" ></i>
                        <br>
                        Customer
                    </div>
                    <div class="float-end">
                        <i class="bi bi-list-task" style="font-size: 3rem;" ></i>
                        <br>
                        Billing List
                    </div>
                    <div class="text-center">
                        <h1 style="font-weight: bold; font-size:20px;">New Customer</h1>
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
                                style="border-radius: 0; width: 48%; background-color: #e3e6f3;" data-bs-toggle="modal"
                                data-bs-target="#savebill">Save Bill</button>
                        <button type="button" class="btn border-0 btn-secondary text-dark btn-lg float-end"
                                style="border-radius: 0; width: 50%; background-color: #e3e6f3" id="print">Print Bill</button>
                    </div>
                    <div style="margin-top:1rem;">
                        <button type="button" class="btn border-0 btn-primary text-white btn-lg float-start"
                                style="border-radius: 0;width: 30%; height:100%;">
                                <i class="bi bi-receipt"></i>
                                                            <br>
                            Sale
                        </button>
                        <button type="button" class="btn border-0 text-white btn-primary btn-lg float-end"
                                style="border-radius: 0;width: 60%; height: 80px;" data-bs-toggle="modal"
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\wiran\Documents\SEMESTER 4\assesment\resources\views/kasir/tugas.blade.php ENDPATH**/ ?>