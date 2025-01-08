<nav class="mb-3 d-flex justify-content-lg-between bg-white p-2 rounded">
    <div class="d-flex flex-column">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active"><a href="#"><?php echo e($name); ?></a></li>
            
        </ol>
        <span><?php echo e($name); ?></span>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="icon-notif">
            <span class="material-icons">
                notifications
            </span>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <img src="<?php echo e(asset('storage/user/'. Auth::user()->foto)); ?>" class="rounded-circle" style="width: 50px;" alt="">
            <div class="d-flex flex-column">
                <p class="m-0" style="font-weight: 700; font-size:14px;"><?php echo e(Auth::user()->name); ?></p>
                <p class="m-0" style="font-size:12px"><?php echo e(Auth::user()->email); ?></p>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\Users\juan\WebsiteUAS\resources\views/admin/components/navbar.blade.php ENDPATH**/ ?>