
<?php $__env->startSection('title', 'Forget-password'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <div>
                            <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light"
                                        src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img
                                        class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                                        alt="looginpage"></a></div>
                            <div class="login-main">
                                <form action="<?php echo e(route('password.email')); ?>" class="theme-form" method="POST">
                                 <?php echo csrf_field(); ?>
                          
                                    <?php if(session()->has('status')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('status')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <h4>Forget Password</h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Enter Your Email </label>
                                        <div class="row">
                                          <div class="form-group">
                                             <label class="col-form-label"></label>
                                             <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                                 placeholder="Input email" type="email" value="<?php echo e(old('email')); ?>" required="">
                                             <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                 <div class="invalid-feedback">
                                                     <?php echo e($message); ?>

                                                 </div>
                                             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                         </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block m-t-10"
                                                    type="submit">Request Password Link</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <p class="mt-4 mb-0">Already have an password?<a class="ms-2"
                                            href="<?php echo e(route('login')); ?>">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/authentication/forget-password.blade.php ENDPATH**/ ?>