

<?php $__env->startSection('content'); ?>
    <div class="card rounded-full p-2">
        <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Id Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nilai Trx</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $x => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td><?php echo e(++$x); ?></td>
                            <td><?php echo e($item->created_at); ?></td>
                            <td><?php echo e($item->code_transaksi); ?></td>
                            <td><?php echo e($item->nama_customer); ?></td>
                            <td><?php echo e($item->alamat); ?></td>
                            <td><?php echo e($item->total_harga); ?></td>
                            <td>
                                <span
                                    class="align-middle <?php echo e($item->status === 'Paid' ? 'badge bg-success text-white' : 'badge bg-danger text-white'); ?>">
                                    <?php echo e($item->status); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between">
                <div class="showData">
                    Data ditampilkan <?php echo e($data->count()); ?> dari <?php echo e($data->total()); ?>

                </div>
                <div>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/admin/page/transaksi.blade.php ENDPATH**/ ?>