<?php $__env->startPush('pre-purpose-script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            get_data();
        });
        function get_data() {
            var calender_type = $('#calender_type :selected').val();
            $('#calendar').removeClass('local_calender');
            $('#calendar').removeClass('google_calender');
            $('#calendar').addClass(calender_type);
            if(calender_type == undefined){
                    calender_type = 'local_calender';
                }
            $.ajax({
                url: "<?php echo e(url('/')); ?>" + "/zoom-meeting/get_holiday_data",
                method: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'calender_type': calender_type
                },
                success: function(data) {

                    (function() {
                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            buttonText: {
                                timeGridDay: "<?php echo e(__('Day')); ?>",
                                timeGridWeek: "<?php echo e(__('Week')); ?>",
                                dayGridMonth: "<?php echo e(__('Month')); ?>"
                            },
                            themeSystem: 'bootstrap',
                            // slotDuration: '00:10:00',
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            height: 'auto',
                            timeFormat: 'H(:mm)',
                            events: data,
                        });
                        calendar.render();
                    })();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Zoom Meeting')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Zoom Meeting')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Zoom Meeting')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('zoommeeting.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>

    </a>
    <?php if(\Auth::user()->type == 'company'): ?>
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-url="<?php echo e(route('zoommeeting.create')); ?>" data-size="lg"
            data-bs-whatever="<?php echo e(__('Create New Zoom Meeting')); ?>"> <span class="text-white">
                <i class="ti ti-plus text-white" data-bs-toggle="tooltip"
                    data-bs-original-title="<?php echo e(__('Create')); ?>"></i></span>
        </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 style="width: 150px;"><?php echo e(__('Calendar')); ?>

                    </h5>
                    <?php if(!empty(App\Models\Utility::settings()['is_googleCal_enabled']) && App\Models\Utility::settings()['is_googleCal_enabled'] == 'on'): ?>
                    <div class="form-group">
                        <label for=""></label>
                        <select class="form-control" name="calender_type" id="calender_type"
                            style="float: right;width: 160px;margin-top: -30px;" onchange="get_data()">
                            <option value="google_calender"><?php echo e(__('Google Calender')); ?></option>
                            <option value="local_calender" selected="true"><?php echo e(__('Local Calender')); ?></option>
                        </select>
                        <input type="hidden" id="path_admin" value="<?php echo e(url('/')); ?>">
                    </div>
                <?php endif; ?>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar local_calender'></div>
                </div>
            </div>
        </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-4"><?php echo e(__('Next meetings')); ?></h4>
                        <ul class="event-cards list-group list-group-flush mt-3 w-100">
                            <?php $__currentLoopData = $meetings_current_month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-info">
                                                    <i class="ti ti-arrow-ramp-right"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="m-0"><?php echo e($meeting->title); ?></h6>
                                                    <small class="text-muted"><?php echo e($meeting->start_date); ?></small>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\main-file\resources\views/zoommeeting/calendar.blade.php ENDPATH**/ ?>