

<?php $__env->startSection('content'); ?>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <h3 class="mt-5 mb-5">Keranjang Belanja</h3>
    <?php if(!$data): ?>
    <?php else: ?>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3">
                <div class="card-body d-flex gap-4">
                    <img src="<?php echo e(asset('storage/product/' . $x->product->foto)); ?>" width="300" alt="">
                    <form action="<?php echo e(route('checkout.product', ['id' => $x->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="desc w-100">
                            <p style="font-size:24px; font-weight:700;"><?php echo e($x->product->nama_product); ?></p>
                            <input type="hidden" name="idBarang" value="<?php echo e($x->product->id); ?>">
                            <input type="number" class="form-control border-0 fs-1" name="harga" id="harga"
                                value="<?php echo e($x->product->harga); ?>">
                            <div class="row mb-2">
                                <label for="qty" class="col-sm-2 col-form-label fs-5">Quantity</label>
                                <div class="col-sm-5 d-flex">
                                    <button class="rounded-start bg-secondary p-2 border border-0 plus"
                                        id="plus">+</button>
                                    <input type="number" name="qty" class="form-control w-25 text-center qty"
                                        id="qty" name="qty" value="<?php echo e($x->qty); ?>">
                                    <button class="rounded-end bg-secondary p-2 border border-0 minus" id="minus"
                                        disabled>-</button>
                                </div>
                            </div>
                            <div class="row">
                                <label for="price" class="col-sm-2 col-form-label fs-5">Total</label>
                                <input type="text" class="col-sm-2 form-control w-25 border-0 fs-4 total" name="total"
                                    readonly id="total">
                            </div>
                            <div class="row w-50 gap-1">
                                <button type="submit" class="btn btn-success col-sm-5">
                                    <i class="fa fa-shopping-cart"></i>
                                    Checkout
                                </button>
                                <button class="btn btn-danger col-sm-5">
                                    <i class="fa fa-trash-alt"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/pelanggan/page/transaksi.blade.php ENDPATH**/ ?>