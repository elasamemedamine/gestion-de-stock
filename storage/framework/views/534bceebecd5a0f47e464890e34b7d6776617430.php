


<?php $__env->startSection("content"); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                <h3 class="text-secondary">
                                    <i class="fas fa-credit-card"></i> Ventes
                                </h3>
                                <a href="<?php echo e(route("payments.index")); ?>" class="btn btn-primary">
                                    <i class="fas fa-plus fa-x2"></i>
                                </a>
                            </div>
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Tarifs</th>
                                        <th>Stock</th>
                                        <th>Livreurs</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                        <th>Type de paiement</th>
                                        <th>Etat de paiement</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($sale->id); ?>

                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $sale->tarifs()->where("sales_id",$sale->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 mb-2">
                                                <div class="h-100">
                                                    <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                        <img src="<?php echo e(asset("images/tarifs/". $tarif->image)); ?>" alt="<?php echo e($tarif->title); ?>" class="img-fluid rounded-circle" width="50" height="50">
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
                                        </td>
                                        <td>
                                            <?php $__currentLoopData = $sale->stock()->where("sales_id",$sale->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $st): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-4 mb-2">
                                                <div class="h-100">
                                                    <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                        
                                                        <i class=" fas fa-solid fa-warehouse"></i>
                                                        <h5 class="text-muted mt-2">
                                                            <?php echo e($st->name); ?>

                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <?php echo e($sale->servant->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($sale->quantity); ?>

                                        </td>
                                        <td>
                                            <?php echo e($sale->total_received); ?>

                                        </td>
                                        <td>
                                            <?php echo e($sale->payment_type === "cash" ? "Espéce" : "Carte bancaire"); ?>

                                        </td>
                                        <td>
                                            <?php echo e($sale->payment_status === "paid" ? "Payé" : "Impayé"); ?>

                                        </td>
                                        <td class="d-flex flex-row justify-content-center align-items-center">
                                            <a href="<?php echo e(route("sales.edit", $sale->id)); ?>" class="btn btn-warning mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="<?php echo e($sale->id); ?>" action="<?php echo e(route("sales.destroy", $sale->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field("DELETE"); ?>
                                                <button class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="my-3 d-flex justify-content-center align-items-center">
                                <?php echo e($sales->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XXXX\Desktop\nightcoding\Fish_Management\resources\views/sales/index.blade.php ENDPATH**/ ?>