
<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
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
                            <form action="/authentication/login" novalidate="" method="post" class="theme-form">
                                <?php echo csrf_field(); ?>

                                <h4>Sign in to account</h4>
                                <p>Enter your Email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input class="form-control" name="email" placeholder="Input email" type="email"
                                        required="">

                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="*********">
                                </div>
                                <div class="form-group mb-0">
                                    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.12/sweetalert2.min.js"
        integrity="sha512-JbRQ4jMeFl9Iem8w6WYJDcWQYNCEHP/LpOA11LaqnbJgDV6Y8oNB9Fx5Ekc5O37SwhgnNJdmnasdwiEdvMjW2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script><?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\daffa\CubaLaravel\resources\views/authentication/login.blade.php ENDPATH**/ ?>