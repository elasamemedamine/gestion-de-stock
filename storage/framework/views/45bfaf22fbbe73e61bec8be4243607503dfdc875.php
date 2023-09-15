


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
                                    <i class="fas fa-plus"></i> Modifier le tarif <?php echo e($tarif->title); ?>

                                </h3>
                                <form action="<?php echo e(route("tarifs.update",$tarif->slug)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field("PUT"); ?>
                                    <div class="form-group">
                                        <input
                                            type="text" name="title" id="title"
                                            class="form-control"
                                            placeholder="Titre"
                                            value="<?php echo e($tarif->title); ?>"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <textarea
                                            name="description" id="description"
                                            rows="5"
                                            cols="30"
                                            class="form-control"
                                            placeholder="Description"
                                        ><?php echo e($tarif->description); ?></textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="number"
                                            name="price"
                                            class="form-control"
                                            placeholder="Prix"
                                            value="<?php echo e($tarif->price); ?>"
                                        >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <img src="<?php echo e(asset("images/tarifs/".$tarif->image)); ?>"
                                            width="200"
                                            height="200"
                                            class="img-fluid"
                                            alt="<?php echo e($tarif->title); ?>">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Image
                                            </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                name="image"
                                                class="custom-file-input"
                                            >
                                            <label class="custom-file-label">
                                                2mg max
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled>Choisir une catégorie</option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php echo e($category->id === $tarif->category->id ? "selected" : ""); ?>

                                                    value="<?php echo e($category->id); ?>">
                                                    <?php echo e($category->title); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\XXXX\Desktop\nightcoding\Fish_Management\resources\views/managements/tarifs/edit.blade.php ENDPATH**/ ?>