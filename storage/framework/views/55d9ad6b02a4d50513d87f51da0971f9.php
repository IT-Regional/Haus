<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '.type', function() {
            var type = $(this).val();
            if (type == 'Employee') {
                $('.department').addClass('d-block');
                $('.department').removeClass('d-none')
            } else {
                $('.department').addClass('d-none')
                $('.department').removeClass('d-block');
            }
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Notice Board')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Notice Board')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Notice Board')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="<?php echo e(route('noticeBoard.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-layout-grid text-white" data-bs-toggle="tooltip"
                data-bs-original-title="<?php echo e(__('Grid VIew')); ?>"></i>
        </a>

        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('noticeBoard.create')); ?>" data-bs-whatever="<?php echo e(__('Create New Notice Board')); ?>"> <span
                class="text-white">
                <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-xl-12">
        <div class=" <?php echo e(isset($_GET['type']) ? 'show' : ''); ?>">
            <div class="card card-body">
                <?php echo e(Form::open(['url' => 'noticeBoard', 'method' => 'get'])); ?>

                <div class="row filter-css">
                    <div class="col-md-2">
                        <select class="form-control" data-toggle="select" name="type">
                            <option value="0"><?php echo e(__('Select Type')); ?></option>
                            <option value="<?php echo e(__('Employee')); ?>"
                                <?php echo e(isset($_GET['type']) && $_GET['type'] == 'Employee' ? 'selected' : ''); ?>><?php echo e(__('Employee')); ?>

                            </option>
                            <option value="<?php echo e(__('Client')); ?>"
                                <?php echo e(isset($_GET['type']) && $_GET['type'] == 'Client' ? 'selected' : ''); ?>><?php echo e(__('Client')); ?>

                            </option>
                        </select>
                    </div>
                    <div class="action-btn bg-info ms-2">
                        <div class="col-auto">
                            <button type="submit" class="mx-3 btn btn-sm d-flex align-items-center" data-toggle="tooltip"
                                data-title="<?php echo e(__('Apply')); ?>"><i class="ti ti-search text-white"
                                    data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Apply')); ?>"></i></button>
                        </div>
                    </div>
                    <div class="action-btn bg-danger ms-2">
                        <div class="col-auto">
                            <a href="<?php echo e(route('noticeBoard.index')); ?>" data-toggle="tooltip"
                                data-title="<?php echo e(__('Reset')); ?>" class="mx-3 btn btn-sm d-flex align-items-center"><i
                                    class="ti ti-trash-off text-white" data-bs-toggle="tooltip"
                                    data-bs-original-title="<?php echo e(__('Reset')); ?>"></i></a>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>


    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <!-- <h5></h5> -->
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <thead>
                            <tr>
                                <th scope="col"><?php echo e(__('Notice')); ?></th>
                                <th scope="col"><?php echo e(__('Date')); ?></th>
                                <th scope="col"><?php echo e(__('To')); ?></th>
                                <th scope="col"><?php echo e(__('Department')); ?></th>
                                <th scope="col"><?php echo e(__('Descrition')); ?></th>
                                <?php if(\Auth::user()->type == 'company'): ?>
                                    <th scope="col" class="text-right"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $noticeBoards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticeBoard): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($noticeBoard->heading); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($noticeBoard->created_at)); ?></td>
                                    <td><?php echo e($noticeBoard->type); ?></td>
                                    <td><?php echo e($noticeBoard->type != 'Client' ? ($noticeBoard->type == 'Employee' && !empty($noticeBoard->departments) ? $noticeBoard->departments->name : __('All')) : '-'); ?>

                                    </td>
                                    <td style="white-space: inherit"><?php echo e($noticeBoard->notice_detail); ?></td>
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <td class="text-right">
                                            <div class="action-btn bg-info ms-2">
                                                <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-url="<?php echo e(route('noticeBoard.edit', $noticeBoard->id)); ?>"
                                                    data-bs-whatever="<?php echo e(__('Edit Notice Board')); ?>"> <span
                                                        class="text-white"> <i class="ti ti-edit" data-bs-toggle="tooltip"
                                                            data-bs-original-title="<?php echo e(__('Edit')); ?>"></i></span></a>
                                            </div>

                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['noticeBoard.destroy', $noticeBoard->id]]); ?>

                                                <a href="#!" class="mx-3 btn btn-sm  align-items-center show_confirm ">
                                                    <i class="ti ti-trash text-white" data-bs-toggle="tooltip"
                                                        data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/noticeBoard/index.blade.php ENDPATH**/ ?>