<?php

    $users = \Auth::user();
    $profile = \App\Models\Utility::get_file('uploads/avatar/');
    $currantLang = $users->currentLanguage();
    $emailTemplate = App\Models\EmailTemplate::first();
    $logo = \App\Models\Utility::get_file('uploads/logo/');

    $company_logo = \App\Models\Utility::GetLogo();
    //  dd($company_logo);
?>

<?php if(isset($settings['cust_theme_bg']) && $settings['cust_theme_bg'] == 'on'): ?>
    <nav class="dash-sidebar light-sidebar transprent-bg">
    <?php else: ?>
        <nav class="dash-sidebar light-sidebar">
<?php endif; ?>
<div class="navbar-wrapper">
    <div class="m-header main-logo">
        <a href="#" class="b-brand">

            <?php if($settings['cust_darklayout'] == 'on'): ?>
                <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png') . '?timestamp=' . time()); ?>"
                    alt="" class="img-fluid" />
            <?php else: ?>
                <img src="<?php echo e($logo . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') . '?timestamp=' . time()); ?>"
                    alt="" class="img-fluid" />
            <?php endif; ?>

        </a>
    </div>
    <div class="navbar-content">
        <ul class="dash-navbar">
            <li class="dash-item">
                <a href="<?php echo e(route('dashboard')); ?>" class="dash-link"><span class="dash-micon"><i
                            class="ti ti-home"></i></span><span class="dash-mtext"><?php echo e(__('Dashboard')); ?></span></a>
            </li>

            <?php if(\Auth::user()->type == 'super admin'): ?>
                <li class="dash-item">
                    <a href="<?php echo e(route('users.index')); ?>"
                        class="dash-link <?php echo e(Request::segment(1) == 'users' ? 'active' : ''); ?>">
                        <span class="dash-micon"><i class="ti ti-users"></i></span> <span
                            class="dash-mtext"><?php echo e(__('Company')); ?> </span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(\Auth::user()->type == 'company'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'client' || Request::segment(1) == 'userlogs' || Request::segment(1) == 'clientlogs' ? 'active dash-trigger' : ''); ?>">
                    <a class="dash-link " data-toggle="collapse" role="button"
                        aria-controls="navbar-getting-started"><span class="dash-micon"><i
                                class="ti ti-users"></i></span><span class="dash-mtext"><?php echo e(__('Personal')); ?></span><span
                            class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'employee' || Request::segment(1) == 'userlogs' ? 'active ' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('employee.index')); ?>"><?php echo e(__('Empleados')); ?></span></a>

                        </li>
                        <li
                            class="dash-item dash-hasmenu <?php echo e(Request::segment(1) == 'client' || Request::segment(1) == 'clientlogs' ? 'active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('client.index')); ?>"><?php echo e(__('Residentes')); ?></a>

                        </li>

                    </ul>
                </li>
            <?php elseif(\Auth::user()->type == 'employee'): ?>
                <li class="dash-item  <?php echo e(Request::segment(1) == 'employee' ? 'active ' : ''); ?>">
                    <a href="<?php echo e(route('employee.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-accessible"></i></span><span
                            class="dash-mtext"><?php echo e(__('My Profile')); ?></span></a>

                </li>
            <?php elseif(\Auth::user()->type == 'client'): ?>
                <li class="dash-item <?php echo e(Request::segment(1) == 'client' ? 'active ' : ''); ?>">
                    <a href="<?php echo e(route('client.show', \Crypt::encrypt(\Auth::user()->id))); ?>" class="dash-link"><span
                            class="dash-micon"><i class="ti ti-home"></i></span><span
                            class="dash-mtext"><?php echo e(__('My Profile')); ?></span></a>

                </li>
            <?php endif; ?>

            

            <?php if(\Auth::user()->type == 'company'): ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::route()->getName() == 'systems.index' ? ' active' : ''); ?>">
                    <a a href="#!" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-settings"></i></span><span
                            class="dash-mtext"><?php echo e(__('Amenidades')); ?></span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'project.dashboard' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('amenidades.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'project.dashboard' ? ' active' : ''); ?>">
                            <a class="dash-link"
                                href="<?php echo e(route('amenidades.index')); ?>"><?php echo e(__('Crear Amenidad ')); ?></a>
                        </li>
                        <li class="dash-item">
                            <a href="<?php echo e(route('amenidades.reservas')); ?>" class="dash-link"><?php echo e(__('Reservas')); ?></a>
                        </li>

                    </ul>
                </li>
            <?php else: ?>
                <li
                    class="dash-item dash-hasmenu <?php echo e(Request::route()->getName() == 'systems.index' ? ' active' : ''); ?>">
                    <a a href="#!" class="dash-link">
                        <span class="dash-micon"><i class="ti ti-settings"></i></span><span
                            class="dash-mtext"><?php echo e(__('Amenidades')); ?></span>
                        <span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="dash-submenu">
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'project.dashboard' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('amenidades.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'project.dashboard' ? ' active' : ''); ?>">
                            <a class="dash-link" href="<?php echo e(route('reservas.index')); ?>"><?php echo e(__('Ver Amenidades')); ?></a>
                        </li>
                        <li
                            class="dash-item <?php echo e(Request::route()->getName() == 'reservas.reservadas' ? ' active' : ''); ?>">
                            <a href="<?php echo e(route('reservas.reservadas')); ?>" class="dash-link">
                                <?php echo e(__('Mis Amenidades')); ?>

                            </a>
                        </li>

                    </ul>
                </li>
            <?php endif; ?>



            

            
            </li>
            
            
            

            

            

            

            

            
            

            

            

            

            

            

            

            

            
            

            

            


            

            

            

            

        </ul>
    </div>
</div>
</nav>
<!-- [ navigation menu ] end -->
<?php /**PATH C:\xampp\htdocs\main-file\resources\views/partials/admin/menu.blade.php ENDPATH**/ ?>