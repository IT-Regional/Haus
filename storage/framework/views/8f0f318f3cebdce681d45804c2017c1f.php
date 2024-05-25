<?php
$profile=\App\Models\Utility::get_file('uploads/avatar/');
// $profile=asset(Storage::url('uploads/avatar'));
?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Estimation')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<div class="d-inline-block">
    <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Estimation')); ?></h5>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Estimation')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php if(\Auth::user()->type=='company'): ?>
<a href="<?php echo e(route('estimate.create')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
    data-bs-whatever="<?php echo e(__('Create New Estimate')); ?>">
    <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
</a>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-12">
    <div class=" <?php echo e(isset($_GET['start_date'])?'show':''); ?>">
        <div class="card card-body">
            <?php echo e(Form::open(array('url' => 'estimate','method'=>'get'))); ?>

            <div class="row filter-css">
                <div class="col-md-2">
                    <select class="form-control" name="status" data-toggle="select">
                        <option value=""><?php echo e(__('Select Status')); ?></option>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($k); ?>" <?php echo e((isset($_GET['start_date']) && $_GET['status']==$k)?'selected':''); ?>>
                            <?php echo e($val); ?> </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-auto">
                    <?php echo e(Form::date('start_date',isset($_GET['start_date'])?$_GET['start_date']: new \DateTime() ,array('class'=>'form-control'))); ?>

                </div>
                <div class="col-auto">
                    <?php echo e(Form::date('end_date',isset($_GET['end_date'])?$_GET['end_date']: new \DateTime() ,array('class'=>'form-control'))); ?>

                </div>
                <div class="action-btn bg-info ms-2">
                    <div class="col-auto">
                        <button type="submit" class="mx-3 btn btn-sm d-flex align-items-center" data-toggle="tooltip"
                            data-title="<?php echo e(__('Apply')); ?>"><i data-bs-toggle="tooltip"
                                data-bs-original-title="<?php echo e(__('Apply')); ?>" class="ti ti-search text-white"></i></button>
                    </div>
                </div>
                <div class="action-btn bg-danger ms-2">
                    <div class="col-auto">
                        <a href="<?php echo e(route('estimate.index')); ?>" data-toggle="tooltip" data-title="<?php echo e(__('Reset')); ?>"
                            class="mx-3 btn btn-sm d-flex align-items-center"><i data-bs-toggle="tooltip"
                                data-bs-original-title="<?php echo e(__('reset')); ?>" class="ti ti-trash-off text-white"></i></a>
                    </div>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="row">
    <?php $__currentLoopData = $estimates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estimate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4">
        <div class="card hover-shadow-lg">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h6 class="mb-0">
                            <a
                                href="<?php echo e(route('estimate.show',\Crypt::encrypt($estimate->id))); ?>"><?php echo e(\Auth::user()->estimateNumberFormat($estimate->estimate)); ?></a>
                        </h6>
                    </div>
                    <div class="col-2 text-right">
                        <div class="actions">
                            <div class="dropdown">
                                <a href="#" class="action-item" data-bs-toggle="dropdown"><i
                                        class="ti ti-dots-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php if(\Auth::user()->type=='company'): ?>
                                    <a href="<?php echo e(route('estimate.edit',\Crypt::encrypt($estimate->id))); ?>"
                                        class="dropdown-item">
                                        <i class="ti ti-edit"></i> <?php echo e(__('Edit')); ?>

                                    </a>

                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['estimate.destroy',
                                    $estimate->id]]); ?>

                                    <a href="#!" class="dropdown-item show_confirm ">
                                        <i class="ti ti-trash"></i> <?php echo e(__('Delete')); ?>

                                    </a>
                                    <?php echo Form::close(); ?>



                                    <?php endif; ?>
                                    <?php if(\Auth::user()->type=='company' || \Auth::user()->type=='client'): ?>
                                    <a href="<?php echo e(route('estimate.show',\Crypt::encrypt($estimate->id))); ?>"
                                        class="dropdown-item">
                                        <i class="ti ti-eye"></i> <?php echo e(__('View')); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->type=='company'): ?>
                                    <?php if($estimate->is_convert==0): ?>
                                    <a href="<?php echo e(route('estimate.convert',$estimate->id)); ?>" class="dropdown-item">
                                        <i class="ti ti-refresh"></i> <?php echo e(__('Convert to Invoice')); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="p-3 border border-dashed">

                    <?php if($estimate->status == 0): ?>
                    <span
                        class="badge bg-primary p-2 px-3 rounded "><?php echo e(__(\App\Models\Estimate::$statues[$estimate->status])); ?></span>
                    <?php elseif($estimate->status == 1): ?>
                    <span
                        class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Estimate::$statues[$estimate->status])); ?></span>
                    <?php elseif($estimate->status == 2): ?>
                    <span
                        class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Estimate::$statues[$estimate->status])); ?></span>
                    <?php elseif($estimate->status == 3): ?>
                    <span
                        class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Estimate::$statues[$estimate->status])); ?></span>
                    <?php elseif($estimate->status == 4): ?>
                    <span
                        class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Estimate::$statues[$estimate->status])); ?></span>
                    <?php endif; ?>

                    <div class="row align-items-center mt-3">
                        <div class="col-6">
                            <h6 class="mb-0"><?php echo e(\Auth::user()->dateFormat($estimate->issue_date)); ?></h6>
                            <span class="text-sm text-muted"><?php echo e(__('Issue Date')); ?></span>
                        </div>
                        <div class="col-6">
                            <h6 class="mb-0"><?php echo e(\Auth::user()->dateFormat($estimate->expiry_date)); ?></h6>
                            <span class="text-sm text-muted"><?php echo e(__('Expiry Date')); ?></span>
                        </div>
                    </div>
                </div>
                <?php if(\Auth::user()->type != 'client'): ?>
                <?php $client=$estimate->clients ?>
                <div class="media mt-4 align-items-center">
                    <img <?php if(!empty($client->avatar)): ?> src="<?php echo e($profile.'/'.$client->avatar); ?>" <?php else: ?>
                    avatar="<?php echo e($estimate->clients->name); ?>" <?php endif; ?> class="avatar rounded-circle avatar-custom"
                    data-toggle="tooltip" data-original-title="<?php echo e(__('Client')); ?>">
                    <div class="media-body ps-3">
                        <div class="text-sm my-0"><?php echo e(!empty($estimate->clients)?$estimate->clients->name:''); ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php if(count($estimates) <= 0): ?> <div class="container col-md-12">
    <div class="row">
        <div class="card">
            <div class="card-body text-center">
                <h6><?php echo e(__('No entries found')); ?></h6>
            </div>
        </div>
    </div>
    </div>
    <?php endif; ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/estimate/index.blade.php ENDPATH**/ ?>