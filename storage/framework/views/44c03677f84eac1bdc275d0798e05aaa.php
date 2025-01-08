

<?php $__env->startSection('content'); ?>
    <div class="card rounded-full">
        <div class="card-header bg-transparent d-flex justify-content-between">
            <button class="btn btn-info" id="addData">
                <i class="fa fa-plus">
                    <span>Tambah User</span>
                </i>
            </button>
            <input type="text" wire:model="search" class="form-control w-25" placeholder="Search....">
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NIK</th>
                        <th>Join Date</th>
                        <th>Nama Karyawan</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $y => $x): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="align-middle">
                            <td><?php echo e(++$y); ?></td>
                            <td>
                                <img src="<?php echo e(asset('storage/user/' . $x->foto)); ?>" style="width:100px;">
                            </td>
                            <td><?php echo e($x->nik); ?></td>
                            <td><?php echo e($x->created_at); ?></td>
                            <td><?php echo e($x->name); ?></td>
                            <td>
                                <span
                                    class='badge text-bg-<?php echo e($x->role === 1 ? 'info' : 'success'); ?>'><?php echo e($x->role === 1 ? 'Admin' : 'Manager'); ?></span>
                            </td>
                            <td>
                                <span
                                    class="badge text-bg-<?php echo e($x->is_active === 1 ? 'success' : 'danger'); ?>"><?php echo e($x->is_active === 1 ? 'Active' : 'No Active'); ?></span>
                            </td>
                            <td>
                                <button class="btn btn-info editModal" data-id="<?php echo e($x->id); ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger deleteData" data-id="<?php echo e($x->id); ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
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
    <div class="tampilData" style="display: none;"></div>
    <div class="tampilEditData" style="display: none;"></div>

    <script>
        $('#addData').click(function() {
            $.ajax({
                url: '<?php echo e(route('addModalUser')); ?>',
                success: function(response) {
                    $('.tampilData').html(response).show();
                    $('#userTambah').modal("show");
                }
            });
        });
        $('.editModal').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "GET",
                url: "<?php echo e(route('showDataUser', ['id' => ':id'])); ?>".replace(':id', id),
                success: function(response) {
                    $('.tampilEditData').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $('.deleteData').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nik = $('#nik').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Hapus data ?',
                text: "Kamu yakin untuk menghapus karyawan ini ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "<?php echo e(route('destroyDataUser', ['id' => ':id'])); ?>".replace(':id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan notifikasi error jika terjadi kesalahan
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/admin/page/user.blade.php ENDPATH**/ ?>