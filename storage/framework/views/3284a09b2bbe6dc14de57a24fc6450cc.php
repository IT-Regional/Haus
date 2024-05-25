<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Note')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Note')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Note')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company' || \Auth::user()->type == 'employee' || \Auth::user()->type == 'client'): ?>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('note.create')); ?>" data-bs-whatever="<?php echo e(__('Create New Note')); ?>"> <span class="text-white">
                <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="row notes-list">
                <?php $__empty_1 = true; $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-0"><?php echo e($note->title); ?></h6>
                                    </div>
                                    <div class="text-right">
                                        <div class="actions">
                                            <div class="dropdown action-item">
                                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i
                                                        class="ti ti-dots-vertical"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        data-url="<?php echo e(route('note.edit', $note->id)); ?>"
                                                        data-bs-whatever="<?php echo e(__('Edit Note')); ?>">
                                                        <i class="ti ti-edit"> </i><?php echo e(__('Edit')); ?></a>

                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['note.destroy', $note->id]]); ?>

                                                    <a href="#!" class=" show_confirm dropdown-item">
                                                        <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                    </a>
                                                    <?php echo Form::close(); ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-justify"><?php echo e($note->description); ?></p>
                                <div class="media align-items-center mt-2">
                                    <div class="media-body">
                                        <span class="h6 mb-0"><?php echo e(__('Created Date')); ?></span><br>
                                        <span
                                            class="text-sm text-muted"><?php echo e(\Auth::user()->dateFormat($note->created_at)); ?></span>
                                    </div>
                                    <?php if(!empty($note->file)): ?>
                                        <?php
                                            $x = pathinfo($note->file, PATHINFO_FILENAME);

                                            $extension = pathinfo($note->file, PATHINFO_EXTENSION);
                                            // dd($extension);
                                            $result = str_replace(['#', "'", ';'], '', $note->file);
                                            $notes = \App\Models\Utility::get_file('uploads/notes/');
                                            // dd($notes);
                                        ?>
                                        <div class="media-body text-end">
                                            <a href="<?php echo e(route('note.receipt', [$x, "$extension"])); ?>" data-toggle="tooltip"
                                                class="btn btn-sm btn-primary btn-icon rounded-pill">
                                                <i class="ti ti-download" data-bs-toggle="tooltip"
                                                    data-bs-original-title="<?php echo e(__('Download')); ?>"></i>
                                            </a>
                                            <a href="<?php echo e($notes . $x . '.' . $extension); ?>" data-toggle="tooltip" target="_blank"
                                                class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                <i class="ti ti-crosshair" data-bs-toggle="tooltip"
                                                    data-bs-original-title="<?php echo e(__('Preview')); ?>"></i>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="card text-center">
                        <div class="pt-10 card-body">
                            <span> <?php echo e(__('No Entry Found')); ?> </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/note/index.blade.php ENDPATH**/ ?>