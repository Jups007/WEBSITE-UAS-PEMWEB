<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('loginproses.pelanggan')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value=""
                                placeholder="Masukan email Anda">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukan password anda">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success col-sm-12 mb-2">Login</button>
                    <button type="button" class="btn btn-primary col-sm-12" data-bs-toggle="modal"
                        data-bs-target="#registerModal">Register</button>
                    <p class="m-auto text-center p-2" style="font-size:12px">Jika belum ada akun register sekarang .. !
                    </p>
                </form>
            </div>

        </div>
    </div>
</div><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/pelanggan/modal/loginPelanggan.blade.php ENDPATH**/ ?>