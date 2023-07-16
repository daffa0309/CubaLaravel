
<?php $__env->startSection('title', 'Tambah Kriteria'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Nilai Kriteria</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Form Layout</li>
    <li class="breadcrumb-item active">Nilai Kriteria</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-6">
                <div class="row">

                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Tambah Nilai Kriteria</h5>
                            </div>
                            <?php if(session()->has('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session('message')); ?>

                                </div>
                            <?php endif; ?>
                            <?php if(session()->has('alert')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session('alert')); ?>

                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <form method="POST" action="<?php echo e(route('insert-nilai-kriteria')); ?>" class="theme-form">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="namaNilaiKriteria">Nama
                                            Sub Kriteria</label>
                                        <div class="col-sm-12">
                                            <input class="form-control <?php $__errorArgs = ['namaNilaiKriteria'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                required id="namaNilaiKriteria" name="namaNilaiKriteria" type="text"
                                                placeholder="Input Nilai Kriteria">
                                            <?php $__errorArgs = ['namaNilaiKriteria'];
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
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label">Kriteria</label>
                                        <select required name="kriteria" class="js-example-basic-single">
                                            <option selected="" disabled="" value="">Pilih
                                                Kriteria...
                                            </option>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idKriteria => $nama): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($idKriteria); ?>"><?php echo e($nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="nilaiKriteria">Nilai Kriteria</label>
                                        <select required name="nilaiKriteria" class="js-example-basic-single">
                                            <option selected="" disabled="" value="">Pilih Nilai
                                                Kriteria...
                                            </option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>

                                        </select>
                                        <?php $__errorArgs = ['nilaiKriteria'];
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
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Zero Configuration  Starts-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Kriteria</h5>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="display" id="basic-2">
                                            <thead>
                                                <tr>
                                                    <th>Nama Sub Kriteria</th>
                                                    <th>Nilai Sub Kriteria</th>
                                                    <th>Nama Kriteria</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>&nbsp; <?php echo e($data->keterangan); ?></td>
                                                        <td>&nbsp; <?php echo e($data->nilai); ?></td>
                                                        <td>&nbsp; <?php echo e($data->nama); ?></td>



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

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/forms/sub-kriteria.blade.php ENDPATH**/ ?>