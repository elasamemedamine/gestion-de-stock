


<?php $__env->startSection("content"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"></i> Modifier le stock <?php echo e($stock->name); ?>

                                </h3>
                                <form action="<?php echo e(route('stock.update', $stock->slug)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("PUT"); ?>
                                    <div class="form-group">
                                        <input
                                            type="text" name="name" id="name"
                                            class="form-control"
                                            placeholder="Nom"
                                            value="<?php echo e($stock->name); ?>"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <select name="status" class="form-control">
                                            <option value="" disabled>
                                                Disponible
                                            </option>
                                            <option <?php echo e($stock->status === 1 ? "selected" : ""); ?> value="1">Oui</option>
                                            <option <?php echo e($stock->status === 0 ? "selected" : ""); ?> value="0">Non</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Valider
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XXXX\Desktop\Fish_Management\resources\views/managements/stock/edit.blade.php ENDPATH**/ ?>