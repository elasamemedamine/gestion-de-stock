


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
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-clipboard-list"></i> Tarif
                                    </h3>
                                    <a href="<?php echo e(route("tarifs.create")); ?>" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $tarifs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <?php echo e($tarif->id); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($tarif->title); ?>

                                                </td>
                                                <td>
                                                    <?php echo e(substr($tarif->description,0,100)); ?>

                                                </td>
                                                <td>
                                                    <?php echo e($tarif->price); ?> DH
                                                </td>
                                                <td>
                                                    <?php echo e($tarif->category->title); ?>

                                                </td>
                                                <td>
                                                    <img src="<?php echo e(asset("images/tarifs/". $tarif->image)); ?>" alt="<?php echo e($tarif->title); ?>"
                                                        class="fluid rounded" width="60" height="60"
                                                    >
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="<?php echo e(route("tarifs.edit",$tarif->slug)); ?>" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="<?php echo e($tarif->id); ?>" action="<?php echo e(route("tarifs.destroy",$tarif->slug)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field("DELETE"); ?>
                                                        <button
                                                            
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    <?php echo e($tarifs->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ISTA TASSILA 1\Desktop\Fish_Management\resources\views/managements/tarifs/index.blade.php ENDPATH**/ ?>