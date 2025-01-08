

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Payment List</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Id Transaksi</th>
                            <th>Nama Penerima</th>
                            <th>Total Transaksi</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$x); ?></td>
                                <td><?php echo e($item->code_transaksi); ?></td>
                                <td><?php echo e($item->nama_customer); ?></td>
                                <td><?php echo e($item->total_harga); ?></td>
                                <td>
                                    <?php if($item->status === 'Unpaid'): ?>
                                        <span class="badge text-bg-danger">Unpaid</span>
                                    <?php else: ?>
                                        <span class="badge text-bg-success">Paid</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('keranjang.bayar', ['id' => $item->id])); ?>"
                                        class="btn btn-success">Bayar</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pelanggan.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/pelanggan/page/keranjang.blade.php ENDPATH**/ ?>