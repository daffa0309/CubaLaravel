
<?php $__env->startSection('title', 'Basic DataTables'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Data Kreditur</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Data Tables</li>
    <li class="breadcrumb-item active">Data Kreditur</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->level == 'admin' && $lengthUsers > 0): ?>
            

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" tabindex="-1" id="getData<?php echo e($value->idKreditur); ?>" role="dialog" aria-hidden="true"
                aria-labelledby="myModalLabel">
                <div class="modal-dialog  lg"role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Judul Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-section">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="namaKreditur">Nama Kreditur</label>
                                                <input class="form-control" disabled value="<?php echo e($value->name); ?>"
                                                    name="namaKreditur" id="namaKreditur" type="text"
                                                    placeholder="Masukkan Nama">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nik">NIK Kreditur</label>
                                                <input class="form-control" disabled value="<?php echo e($value->nik); ?>"
                                                    name="nik" id="nik" type="number" required
                                                    placeholder="421563">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label class="col-sm-3 col-form-label">Foto KTP</label>
                                                <div class="media-img"><img
                                                        style='height: 100%; width: 100%; object-fit: contain'
                                                        src="<?php echo e(asset('storage/images/ktp/' . $value->ktpImage)); ?>"
                                                        alt=""></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="jenisKelamin">Jenis Kelamin</label>
                                                <input class="form-control" disabled value="<?php echo e($value->jeniskelamin); ?>"
                                                    name="nik" id="nik" type="text" required
                                                    placeholder="421563">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nomorTelp">Nomor Telp Kreditur</label>
                                                <input class="form-control" required disabled value="<?php echo e($value->telepon); ?>"
                                                    name="nomorTelp" id="nomorTelp" type="text" placeholder="0821">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tempatLahir">Tempat Lahir</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->tempatLahir); ?>" name="tempatLahir" id="tempatLahir"
                                                    type="text">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tanggalLahir">Tanggal Lahir</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->tanggalLahir); ?>" name="tanggalLahir" id="tanggalLahir"
                                                    type="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->pendidikanterakhir); ?>" name="pendidikanterakhir"
                                                    id="pendidikanterakhir" type="text">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="alasan">Alasan</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->alasan); ?>" name="alasan" id="alasan"
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="umurKreditur">Umur Kreditur</label>
                                                <select required class="form-select digits" disabled name="umurKreditur"
                                                    id="umurKreditur">
                                                    <?php switch($value->C6):
                                                        case ('5'): ?>
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">46 - 55 </option>
                                                        <?php break; ?>

                                                        <?php case ('4'): ?>
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">24 - 26 </option>
                                                        <?php break; ?>

                                                        <?php case ('3'): ?>
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">36 - 45 </option>
                                                        <?php break; ?>

                                                        <?php case ('2'): ?>
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">17 - 23</option>
                                                        <?php break; ?>

                                                        <?php case ('1'): ?>
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">27 - 35</option>
                                                        <?php break; ?>

                                                        <?php default: ?>
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih Umur...
                                                            </option>
                                                    <?php endswitch; ?>


                                                </select>
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="nomorTelp">Tipe Kendaraan</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->tipeKendaraan); ?>" name="modelKendaraan"
                                                    id="modelKendaraan" type="text"
                                                    placeholder="Masukkan Model Kendadraan Anda">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="modelKendaraan">Model Kendaraan</label>
                                                <input class="form-control" required disabled
                                                    value="<?php echo e($value->modelKendaraan); ?>" name="modelKendaraan"
                                                    id="modelKendaraan" type="text"
                                                    placeholder="Masukkan Model Kendadraan Anda">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="umurKendaraan">Umur Kendaraan</label>
                                                <select required class="form-select digits" disabled name="umurKendaraan"
                                                    id="umurKendaraan">
                                                    <?php switch($value->C5):
                                                        case ('5'): ?>
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">10 Tahun</option>
                                                        <?php break; ?>

                                                        <?php case ('4'): ?>
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">7 - 8 Tahun</option>
                                                        <?php break; ?>

                                                        <?php case ('3'): ?>
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">5 - 6 Tahun </option>
                                                        <?php break; ?>

                                                        <?php case ('2'): ?>
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">3 - 4 Tahun </option>
                                                        <?php break; ?>

                                                        <?php case ('1'): ?>
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">1 - 2 Tahun </option>
                                                        <?php break; ?>

                                                        <?php default: ?>
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih Umur
                                                                Kendaraan...
                                                            </option>
                                                    <?php endswitch; ?>


                                                </select>
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label class="col-sm-3 col-form-label">Foto BPKB</label>
                                                <div class="media-img"><img
                                                        style='height: 100%; width: 100%; object-fit: contain'
                                                        src="<?php echo e(asset('storage/images/bpkb/' . $value->bpkbImage)); ?>"
                                                        alt=""></div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="pekerjaan">Pekerjaan</label>
                                                <select required class="form-select digits" disabled name="pekerjaan"
                                                    id="pekerjaan">
                                                    <?php switch($value->C3):
                                                        case ('5'): ?>
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">PNS</option>
                                                        <?php break; ?>

                                                        <?php case ('4'): ?>
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">Karyawan Swasta</option>
                                                        <?php break; ?>

                                                        <?php case ('3'): ?>
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">Wiraswasta</option>
                                                        <?php break; ?>

                                                        <?php case ('2'): ?>
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">Profesional</option>
                                                        <?php break; ?>

                                                        <?php case ('1'): ?>
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">Pensiunan</option>
                                                        <?php break; ?>

                                                        <?php default: ?>
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih
                                                                Pekerjaan...
                                                            </option>
                                                    <?php endswitch; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="penghasilan">Penghasilan</label>
                                                <select required class="form-select digits" disabled
                                                    value="<?php echo e($value->name); ?>" name="penghasilan" id="penghasilan">
                                                    <?php switch($value->C2):
                                                        case ('5'): ?>
                                                            <!-- Kode untuk opsi 5 -->
                                                            <option value="5">15.000.000 - 50.000.000</option>
                                                        <?php break; ?>

                                                        <?php case ('4'): ?>
                                                            <!-- Kode untuk opsi 4 -->
                                                            <option value="4">8.000.000 - 14.999.000</option>
                                                        <?php break; ?>

                                                        <?php case ('3'): ?>
                                                            <!-- Kode untuk opsi 3 -->
                                                            <option value="3">5.500.000 - 7.999.000</option>
                                                        <?php break; ?>

                                                        <?php case ('2'): ?>
                                                            <!-- Kode untuk opsi 2 -->
                                                            <option value="2">3.500.000 - 5.499.000</option>
                                                        <?php break; ?>

                                                        <?php case ('1'): ?>
                                                            <!-- Kode untuk opsi 1 -->
                                                            <option value="1">2.500.000 - 3.499.000</option>
                                                        <?php break; ?>

                                                        <?php default: ?>
                                                            <!-- Kode default jika tidak ada opsi yang cocok -->
                                                            <option selected="" disabled="" value="">Pilih
                                                                Penghasilan...
                                                            </option>
                                                    <?php endswitch; ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="tanggungan">Tanggungan</label>
                                                <select required class="form-select digits" disabled
                                                    value="<?php echo e($value->name); ?>" name="tanggungan" id="tanggungan">
                                                    <option selected="" disabled="" value="">Pilih
                                                        Tanggungan...
                                                    </option>
                                                    <option value="1">Tidak Ada</option>
                                                    <option value="2">1 Tanggungan</option>
                                                    <option value="3">2 Tanggungan</option>
                                                    <option value="4">3 - 5 Tanggungan</option>
                                                    <option value="5">Lebih dari 5 Tanggungan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="kondisiKendaraan">Kondisi Kendaraan</label>
                                                <select required class="form-select digits" disabled
                                                    value="<?php echo e($value->name); ?>" name="kondisiKendaraan"
                                                    id="kondisiKendaraan">
                                                    <option selected="" disabled="" value="">Pilih Kondisi
                                                        Kendaraan...
                                                    </option>
                                                    <option value="1">Adanya Kerusakan yang serius</option>
                                                    <option value="2">Perlu Beberapa Perbaikan</option>
                                                    <option value="3">Kondisi Kendaraan wajar, memerlukan perawatan
                                                        Rutin
                                                    </option>
                                                    <option value="4">Kondisi Kendaraan terawat, tidak perlu perbaikan
                                                        signifikan</option>
                                                    <option value="5">Kendaraan dalam kondisi sangat baik, tampak
                                                        seperti
                                                        baru</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="statusTempatTinggal">Status Tempat Tinggal</label>
                                                <select required class="form-select digits" disabled
                                                    value="<?php echo e($value->name); ?>" name="statusTempatTinggal"
                                                    id="statusTempatTinggal">
                                                    <option selected="" disabled="" value="">Pilih Status
                                                        Tempat
                                                        Tinggal...
                                                    </option>
                                                    <option value="1">Kost</option>
                                                    <option value="2">Kontrak</option>
                                                    <option value="3">Milik Keluarga</option>
                                                    <option value="4">Milik Orang Tua</option>
                                                    <option value="5">Milik Sendiri</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Final Ranking</h5>
                            <div style="margin-left: 1080px">
                                <a class="btn btn-primary" href="<?php echo e(route('input-data')); ?>" type="button">Tambah
                                    Data</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display" id="basic-2">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Skor</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $finalRank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $final): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr
                                                style="<?php if($final['finalRank'] >= 1.9): ?> background-color: lightgreen; <?php else: ?> background-color: lightyellow; <?php endif; ?>">
                                                <td>&nbsp; <?php echo e($final['name']); ?></td>

                                                <td>&nbsp; <?php echo e($final['finalRank']); ?></td>
                                                <?php if($final['visible'] == 0): ?>
                                                    <td>Menunggu Untuk DiReview </td>
                                                <?php elseif($final['visible'] == 1): ?>
                                                    <td>Data telah diterima </td>
                                                <?php endif; ?>
                                                <td>&nbsp; &nbsp; <a href="#" class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#getData<?php echo e($final['idKreditur']); ?>">
                                                        Lihat Data
                                                    </a>
                                                    <a href="#" class="btn btn-primary edit-btn" data-id="<?php echo e($final['idKreditur']); ?>">Edit</a>

                                                </td>
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
    <?php elseif($lengthUsers > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Final Ranking</h5>
                        <?php if($lengthData = 0): ?>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="<?php echo e(route('input-data')); ?>" type="button">Tambah
                                Data</a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Final Ranking</h5>
                        <?php if($lengthData = 0): ?>
                        <div style="margin-left: 1080px">
                            <a class="btn btn-primary" href="<?php echo e(route('input-data')); ?>" type="button">Tambah
                                Data</a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-2">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Skor</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function(e) {
            e.preventDefault();
            var dataId = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin memperbarui data ini?')) {
                // Lakukan tindakan redirect ke halaman edit dengan menggunakan dataId
                window.location.href =  dataId + '/update-kreditur';
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\daffa\CubaLaravel\resources\views/tables/datatable-basic-init.blade.php ENDPATH**/ ?>