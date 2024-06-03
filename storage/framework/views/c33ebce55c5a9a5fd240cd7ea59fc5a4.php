<?php
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Zoom Meeting')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Zoom Meeting')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Zoom Meeting')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/daterangepicker.css')); ?>"> -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="<?php echo e(route('zoommeeting.calendar')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
            title="Calendar View">
            <i class="ti ti-calendar text-white"></i>
        </a>

        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-size="lg"
            data-bs-target="#exampleModal" data-url="<?php echo e(route('zoommeeting.create')); ?>"
            data-bs-whatever="<?php echo e(__('Create New Zoom Meeting')); ?>"> <span class="text-white">
                <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header card-body table-border-style">
                    <!-- <h5></h5> -->
                    <div class="table-responsive">
                        <table class="table" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th> <?php echo e(__('TITLE')); ?> </th>

                                    <th> <?php echo e(__('PROJECT')); ?> </th>
                                    <?php if(\Auth::user()->type == 'employee' || \Auth::user()->type == 'company'): ?>
                                        <th> <?php echo e(__('CLIENT')); ?> </th>
                                    <?php endif; ?>
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <th> <?php echo e(__('EMPLOYEE')); ?> </th>
                                    <?php endif; ?>
                                    <th> <?php echo e(__('MEETING TIME')); ?> </th>
                                    <th> <?php echo e(__('DURATION')); ?> </th>
                                    <th> <?php echo e(__('JOIN URL')); ?> </th>
                                    <th> <?php echo e(__('STATUS')); ?> </th>
                                    <?php if(\Auth::user()->type == 'company'): ?>
                                        <th class="text-right"> <?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(\Auth::user()->type != 'super admin'): ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($item->title); ?></td>
                                            <td><?php echo e(!empty($item->projectName) ? $item->projectName->title : ''); ?></td>
                                            <?php if(\Auth::user()->type == 'employee' || \Auth::user()->type == 'company'): ?>
                                                <td><?php echo e(!empty($item->projectClient) ? $item->projectClient->name : ''); ?></td>
                                            <?php endif; ?>
                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                <td class="user-group1">
                                                    <?php $__currentLoopData = explode(',', $item->employee); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <img <?php if(!empty($getUsersData[$projectUser]['avatar'])): ?> src="<?php echo e($profile . '/' . $getUsersData[$projectUser]['avatar']); ?>" <?php else: ?> avatar="<?php echo e(!empty($projectUser) ? $getUsersData[$projectUser]['name'] : ''); ?>" <?php endif; ?>
                                                            data-original-title="<?php echo e(!empty($projectUser) ? $getUsersData[$projectUser]['name'] : ''); ?>"
                                                            data-toggle="tooltip"
                                                            data-original-title="<?php echo e(!empty($projectUser) ? $getUsersData[$projectUser]['name'] : ''); ?>"
                                                            class="">
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                            <?php endif; ?>
                                            <td><?php echo e($item->start_date); ?></td>
                                            <td><?php echo e($item->duration); ?> <?php echo e(__('Minutes')); ?></td>
                                            <td>
                                                <?php if($item->created_by == \Auth::user()->id && $item->checkDateTime()): ?>
                                                    <a href="<?php echo e($item->start_url); ?>" target="_blank">
                                                        <?php echo e(__('Start meeting')); ?> <i
                                                            class="fas fa-external-link-square-alt "></i></a>
                                                <?php elseif($item->checkDateTime()): ?>
                                                    <a href="<?php echo e($item->join_url); ?>" target="_blank">
                                                        <?php echo e(__('Join meeting')); ?> <i
                                                            class="fas fa-external-link-square-alt "></i></a>
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->checkDateTime()): ?>
                                                    <?php if($item->status == 'waiting'): ?>
                                                        <span
                                                            class="badge bg-info p-2 px-3 rounded"><?php echo e(ucfirst($item->status)); ?></span>
                                                    <?php else: ?>
                                                        <span
                                                            class="badge bg-success p-2 px-3 rounded"><?php echo e(ucfirst($item->status)); ?></span>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <span
                                                        class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('End')); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if(\Auth::user()->type == 'company'): ?>
                                                <td class="text-end">
                                                    <div class="action-btn bg-danger ms-2">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['zoommeeting.destroy', $item->id]]); ?>

                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm  align-items-center show_confirm">
                                                            <i class="ti ti-trash text-white" data-bs-toggle="tooltip"
                                                                data-bs-original-title="<?php echo e(__('Delete')); ?>"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>

                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(url('assets/js/daterangepicker.js')); ?>"></script>
    <script type="text/javascript">
        $(document).on('change', '#client_id', function() {
            getProjects($(this).val());
        });

        function getProjects(id) {
            $.get("<?php echo e(url(']')); ?>/" + id, function(data, status) {

                var list = '';
                $('#project_id').empty();
                if (data.length > 0) {
                    list += "<option value=''> <?php echo e(__('Select Project')); ?></option>";
                } else {
                    list += "<option value=''> <?php echo e(__('No Projects')); ?> </option>";
                }

                $.each(data, function(i, item) {
                    list += "<option value='" + item.id + "'>" + item.name + "</option>"
                });
                $('#project_id').html(list);
            });
        }
        $(document).on("click", '.member_remove', function() {
            var rid = $(this).attr('data-id');
            alert(rid);
            $('.confirm_yes').addClass('m_remove');
            $('.confirm_yes').attr('uid', rid);
            $('#cModal').modal('show');
        });
        $(document).on('click', '.m_remove', function(e) {
            var id = $(this).attr('uid');
            var p_url = "<?php echo e(url('zoom-meeting')); ?>" + '/' + id;
            var data = {
                id: id
            };
            deleteAjax(p_url, data, function(res) {
                toastrs(res.flag, res.msg);
                if (res.flag == 1) {
                    location.reload();
                }
                $('#cModal').modal('hide');
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\main-file\resources\views/zoommeeting/index.blade.php ENDPATH**/ ?>