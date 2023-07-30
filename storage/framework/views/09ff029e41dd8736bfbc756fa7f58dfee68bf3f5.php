
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Data Akun</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Data Akun</li>
    <li class="breadcrumb-item active">Data Akun</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" tabindex="-1" id="getData<?php echo e($value->id); ?>" role="dialog" aria-hidden="true"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog  lg"role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Edit Akun</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form class="card" method="POST" action="<?php echo e(route('update-akun', ['id' => $value->id])); ?>">
                                <?php echo method_field('put'); ?>
                                <?php echo csrf_field(); ?>
                                <div class="form-section">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="firstName">First Name</label>
                                                <input class="form-control" value="<?php echo e($value->FirstName); ?>" name="firstName"
                                                    id="firstName" type="text" placeholder="Masukkan Nama">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="lastName">Last Name</label>
                                                <input class="form-control" value="<?php echo e($value->LastName); ?>" name="lastName"
                                                    id="lastName" type="text" required placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-12">
                                                <label for="email">Email</label>
                                                <input class="form-control" value="<?php echo e($value->email); ?>" name="email"
                                                    id="email" type="email" required placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="level">Level</label>
                                                <select required class="form-select digits" name="level" id="level">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option <?php echo e($value->level == 'admin' ? 'selected' : ''); ?> value="admin">
                                                        Admin</option>
                                                    <option <?php echo e($value->level == 'user' ? 'selected' : ''); ?> value="user">
                                                        User
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                            <button class="btn btn-primary" type="submit">Update Akun</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    
    <div class="modal fade" tabindex="-1" id="addDataModal" role="dialog" aria-hidden="true" aria-labelledby="addModal">
        <div class="modal-dialog  lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModal">Tambah Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/authentication/signup"method="post" class="theme-form">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-section">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="firstName">First Name</label>
                                            <input class="form-control" required name="firstName" id="firstName"
                                                type="text" placeholder="Masukkan Nama">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="lastName">Last Name</label>
                                            <input class="form-control" required name="lastName" id="lastName"
                                                type="text" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-12">
                                            <label for="email">Email</label>
                                            <input class="form-control" required name="email" id="email"
                                                type="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="level">Level</label>
                                            <select required class="form-select digits" name="level" id="level">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option value="admin">
                                                    Admin</option>
                                                <option value="user">
                                                    User
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="password">Password</label>
                                            <input class="form-control" required name="password" id="password"
                                                type="password" placeholder="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-6">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input class="form-control" required name="password_confirmation"
                                                id="password_confirmation" type="password"
                                                placeholder="Passsword Confirmation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                            <button class="btn btn-primary" type="submit">Tambah Akun</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data User</h5>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addDataModal"
                                type="button">Tambah
                                Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Fist Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>&nbsp; <?php echo e($data->FirstName); ?></td>
                                            <td>&nbsp; <?php echo e($data->LastName); ?></td>
                                            <td>&nbsp; <?php echo e($data->email); ?></td>
                                            <td>&nbsp; <?php echo e($data->level); ?></td>

                                            <?php if($data->id == auth()->user()->id): ?>
                                                <td>
                                                </td>
                                            <?php else: ?>
                                                <td>&nbsp; &nbsp; <a href="#" class="btn btn-warning btn"
                                                        data-toggle="modal" data-target="#getData<?php echo e($data->id); ?>">
                                                        Edit Akun
                                                    </a>
                                                    <a href="#" class="btn btn-danger edit-btn"
                                                        data-id="<?php echo e($data->id); ?>">Delete Akun</a>

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
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function(e) {
                e.preventDefault();
                var dataId = $(this).data('id');
                if (confirm('Apakah Anda yakin ingin menerima data ini?')) {
                    // Lakukan tindakan redirect ke halaman edit dengan menggunakan dataId
                    window.location.href = dataId + '/update-kreditur';
                }
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/tables/master-account.blade.php ENDPATH**/ ?>