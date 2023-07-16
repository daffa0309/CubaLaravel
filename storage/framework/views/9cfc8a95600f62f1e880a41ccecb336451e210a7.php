
<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if(session()->has('loginError')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"><?php echo e(session('loginError')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light"
                                    src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img
                                    class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form action="/authentication/login" method="post" class="theme-form">
                                <?php echo csrf_field(); ?>

                                <h4>Sign in to account</h4>
                                <p>Enter your Email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
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
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">

                                </div>
                                <div class="form-group mb-0">
                                    
                                    <a class="link" href="<?php echo e(route('forget-password')); ?>">Forgot password?</a> 
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>

                                <p class="mt-4 mb-0">Don't have account?<a class="ms-2"
                                        href="<?php echo e(route('sign-up')); ?>">Create Account</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if(Session::has('message')): ?>
        <script>
            swal("Sukses Login!", "<?php echo Session::get('message'); ?>", "success", {
                button: "OK"
            })
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/authentication/login.blade.php ENDPATH**/ ?>