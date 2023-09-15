


<?php $__env->startSection("content"); ?>
<div class="container">
    <form id="add-sale" action="<?php echo e(route("sales.store")); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <a href="/home" class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="my-2 col-md-3">
                        <h3 class="text-muted border-bottom">
                            <?php echo e(Carbon\Carbon::now()); ?>

                        </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <a href="<?php echo e(route("sales.index")); ?>" class="btn btn-outline-secondary float-right">
                                Toutes les ventes
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3">
                                <div class="card p-2 mb-2 d-flex
                                                    flex-column justify-content-center
                                                    align-items-center
                                                    list-group-item-action">
                                    <div class="align-self-end">
                                        <input type="checkbox" name="stock_id[]" id="stock" value="<?php echo e($st->id); ?>">
                                    </div>
                                    <i class="fas fa-light fa-warehouse"></i>
                                    <span class="mt-2 text-muted font-weight-bold">
                                        <?php echo e($st->name); ?>

                                    </span>
                                    <div class="d-flex
                                                    flex-column justify-content-between
                                                    align-items-center">
                                        <a href="<?php echo e(route("stock.edit",$st->slug)); ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <hr>
                                    <?php $__currentLoopData = $st->sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sale->created_at >= Carbon\Carbon::today()): ?>
                                    <div style="border : dashed pink" class="mb-2 mt-2 shadow w-100" id="<?php echo e($sale->id); ?>">
                                        <div class="card">
                                            <div class="card-body d-flex
                                                                    flex-column justify-content-center
                                                                    align-items-center">
                                                <?php $__currentLoopData = $sale->tarifs()->where("sales_id",$sale->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <h5 class="font-weight-bold mt-2">
                                                    <?php echo e($tarif->title); ?>

                                                </h5>
                                                <span class="text-muted">
                                                    <?php echo e($tarif->price); ?> DH
                                                </span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <h5 class="font-weight-bold mt-2">
                                                <span class="badge badge-danger">
                                                        Livreur : <?php echo e($sale->livreurs->name??''); ?>

                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Qté : <?php echo e($sale->quantity); ?>

                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Prix : <?php echo e($sale->total_price); ?> DH
                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Total : <?php echo e($sale->total_received); ?> DH
                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Reste : <?php echo e($sale->change); ?> DH
                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Type de paiement :
                                                        <?php echo e($sale->payment_type === "cash" ?
                                                                             "Espéce" : "Carte bancaire"); ?>

                                                    </span>
                                                </h5>
                                                <h5 class="font-weight-bold mt-2">
                                                    <span class="badge badge-light">
                                                        Etat de paiement :
                                                        <?php echo e($sale->payment_status === "paid" ?
                                                                             "Payé" : "Impayé"); ?>

                                                    </span>
                                                </h5>
                                                <hr>
                                                <div class="d-flex
                                                                    flex-column justify-content-center
                                                                    align-items-center">
                                                    <span class="font-weight-bold">
                                                        Fish MANAGER
                                                    </span>
                                                    <span>
                                                        AGADIR
                                                    </span>
                                                    <span>
                                                        0123456789
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 d-flex justify-content-center">
                                        <a href="<?php echo e(route("sales.edit",$sale->id)); ?>" class="btn btn-sm btn-warning mr-1">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" target="_blank" class="btn btn-sm btn-primary">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-md-12 card p-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a href="#<?php echo e($category->slug); ?>" class="nav-link mr-1 <?php echo e($category->slug === "test1" ? "active" : ""); ?>" id="<?php echo e($category->slug); ?>-tab" data-toggle="pill" role="tab" aria-controls="<?php echo e($category->slug); ?>" aria-selected="true">
                            <?php echo e($category->title); ?>

                        </a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <div class="tab-content" id="pills-tabcontent">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade <?php echo e($category->slug === "test1" ? "show active" : ""); ?>" id="<?php echo e($category->slug); ?>" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <?php $__currentLoopData = $tarifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex
                                                flex-column justify-content-center
                                                align-items-center">
                                        <div class="align-self-end">
                                            <input type="checkbox" name="tarif_id[]" id="tarif_id" value="<?php echo e($tarif->id); ?>">
                                        </div>
                                        <img src="<?php echo e(asset("images/tarifs/". $tarif->image)); ?>" alt="<?php echo e($tarif->title); ?>" class="img-fluid rounded-circle" width="100" height="100">
                                        <h5 class="font-weight-bold mt-2">
                                            <?php echo e($tarif->title); ?>

                                        </h5>
                                        <h5 class="text-muted">
                                            <?php echo e($tarif->price); ?> DH
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <select name="livreur_id" class="form-control">
                                <option value="" selected disabled>
                                    Livreur
                                </option>
                                <?php $__currentLoopData = $livreurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $livreur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($livreur->id); ?>">
                                    <?php echo e($livreur->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    Qté
                                </div>
                            </div>
                            <input type="number" name="quantity" class="form-control" placeholder="Qté">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="total_price" class="form-control" placeholder="Prix">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="total_received" class="form-control" placeholder="Total">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    $
                                </div>
                            </div>
                            <input type="number" name="change" class="form-control" placeholder="Reste">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    .00
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="payment_type" class="form-control">
                                <option value="" selected disabled>
                                    Type de paiement
                                </option>
                                <option value="cash">
                                    Espéce
                                </option>
                                <option value="card">
                                    Carte bancaire
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="payment_status" class="form-control">
                                <option value="" selected disabled>
                                    Etat de paiement
                                </option>
                                <option value="paid">
                                    Payé
                                </option>
                                <option value="unpaid">
                                    Impayé
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("javascript"); ?>
<script>
    function print(el) {
        const page = document.body.innerHTML;
        const content = document.getElementById(el).innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = page;
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XXXX\Desktop\Fish_Management\resources\views/payments/index.blade.php ENDPATH**/ ?>