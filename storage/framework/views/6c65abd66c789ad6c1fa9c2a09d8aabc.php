<?php
$profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Client Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0">  <?php echo e(\Auth::user()->clientIdFormat($client->client_id)); ?> <?php echo e(__('Details')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e($user->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__($user->name)); ?></h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Email')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($user->email); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Mobile')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->mobile); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Address 1')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <div class="col-6 text-right"><?php echo e($client->address_1); ?></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Address 2')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->address_2); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('City')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->city); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('State')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->state); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Country')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->country); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Zip Code')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                <?php echo e($client->zip_code); ?>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e($user->name); ?></h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Email')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($user->email); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Mobile')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->mobile); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Address 1')); ?> </span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->address_1); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Address 2')); ?> </span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->address_2); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('City')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->city); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('State')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->state); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Country')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->country); ?></span></dd>
                        <dt class="col-sm-3"><span class="h6 text-sm mb-0"><?php echo e(__('Zip Code')); ?></span></dt>
                        <dd class="col-sm-9"><span class="text-md"><?php echo e($client->zip_code); ?></span></dd>
                    </dl>
                </div>
            </div>
        </div> -->
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Company Detail')); ?></h5>
                </div>

                <div class="card-footer py-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('ID')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e(\Auth::user()->clientIdFormat($client->client_id)); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Company Name')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->company_name); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Web Site')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e($client->website); ?>" target="_blank"><?php echo e($client->website); ?></a>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Tax Number')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->tax_number); ?>

                                </div>
                            </div>
                        </li>
                        <li class="list-group-item px-0">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <span class="form-control-label"><?php echo e(__('Note')); ?></span>
                                </div>
                                <div class="col-6 text-right">
                                    <?php echo e($client->notes); ?>

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\main-file\resources\views/client/view.blade.php ENDPATH**/ ?>