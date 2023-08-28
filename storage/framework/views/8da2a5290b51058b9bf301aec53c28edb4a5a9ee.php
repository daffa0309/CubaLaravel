
<?php $__env->startSection('title', 'Base Inputs'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>Base Inputs</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
    <li class="breadcrumb-item">Form Controls</li>
    <li class="breadcrumb-item active">Base Inputs</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .form-section {
            display: none;
        }

        .form-section.current {
            display: inline;
        }

        .parsley-errors-list {
            color: red;
        }
    </style>

    <script>
        swal("Good job!", "You clicked the button!", "success");
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Basic form control</h5>
                    </div>
                    <form action="/insert/data-kreditur"method="post" enctype="multipart/form-data" class="theme-forest">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="form-section">
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="namaKreditur">Nama Lengkap</label>
                                                <input class="form-control" required name="namaKreditur" id="namaKreditur"
                                                    type="text" placeholder="Masukkan Nama">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-6">
                                                <label for="alamat">Alamat KTP</label>
                                                <input class="form-control" name="alamat" id="alamat" type="text"
                                                    required placeholder="Masukkan Alamat">
                                                <div class="invalid-feedback">Please provide a valid city.</div>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label">Alamat Lengkap Saat Ini</label>
                                            <input class="form-control" name="alamatLengkap" type="text">
                                        </div>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="kecamatan">Kecamatan</label>
                                                <select required class="form-select digits" name="kecamatan" id="kecamatan">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="kabupaten">Kabupaten</label>
                                                <select required class="form-select digits" name="kabupaten" id="kabupaten">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-4">
                                                <label for="propinsi">Propinsi</label>
                                                <select required class="form-select digits" name="propinsi" id="propinsi">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="pria">Pria</option>
                                                    <option value="wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label">Upload Foto KTP</label>
                                            <input class="form-control" name="ktp" type="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="jenisKelamin">Jenis Kelamin</label>
                                            <select required class="form-select digits" name="jenisKelamin"
                                                id="jenisKelamin">
                                                <option selected="" disabled="" value="">Choose...</option>
                                                <option value="pria">Pria</option>
                                                <option value="wanita">Wanita</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nomorTelp">Nomor Telp Kreditur</label>
                                            <input class="form-control" required name="nomorTelp" id="nomorTelp"
                                                type="text" placeholder="0821">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tempatLahir">Tempat Lahir</label>
                                            <input class="form-control" required name="tempatLahir" id="tempatLahir"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tanggalLahir">Tanggal Lahir</label>
                                            <input class="form-control" required name="tanggalLahir" id="tanggalLahir"
                                                type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="pendidikanTerakhir">Pendidikan Terakhir</label>
                                            <select required class="form-select digits" name="pendidikanTerakhir"
                                                id="pendidikanTerakhir" placeholder="Masukan Pendidikan Terakhir">
                                                <option selected="" disabled="" value="">Choose...</option>

                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="alasan">Alasan</label>
                                            <input class="form-control" required name="alasan" id="alasan"
                                                type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-section">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="umurKreditur">Umur Kreditur</label>
                                            <select required class="form-select digits" name="umurKreditur"
                                                id="umurKreditur">
                                                <option selected="" disabled="" value="">Pilih Umur...
                                                </option>
                                                <option value="1">27 - 35</option>
                                                <option value="2">36 - 45</option>
                                                <option value="3">24 - 26 </option>
                                                <option value="4">17 - 23 </option>
                                                <option value="5">46 - 55 </option>

                                            </select>
                                            <div class="invalid-feedback">Please provide a valid city.</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nomorTelp">Tipe Kendaraan</label>
                                            <select required class="form-select digits" name="tipeKendaraan"
                                                id="tipeKendaraan">
                                                <option selected="" disabled="" value="">Pilih Tipe
                                                    Kendaraan...
                                                </option>
                                                <option value="Mobil">Mobil</option>
                                                <option value="Motor">Motor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="modelKendaraan">Model Kendaraan</label>
                                            <input class="form-control" required name="modelKendaraan"
                                                id="modelKendaraan" type="text"
                                                placeholder="Masukkan Model Kendadraan Anda">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="umurKendaraan">Umur Kendaraan</label>
                                            <select required class="form-select digits" name="umurKendaraan"
                                                id="umurKendaraan">
                                                <option selected="" disabled="" value="">Pilih Umur
                                                    Kendaraan...
                                                </option>
                                                <option value="5">10 Tahun</option>
                                                <option value="4">7 - 8 Tahun</option>
                                                <option value="3">5 - 6 Tahun </option>
                                                <option value="2">3 - 4 Tahun </option>
                                                <option value="1">1 - 2 Tahun </option>

                                            </select>
                                            <div class="invalid-feedback">Please provide a valid city.</div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Upload Foto BPKB</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="bpkb" type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <select required class="form-select digits" name="pekerjaan" id="pekerjaan">
                                                <option selected="" disabled="" value="">Pilih Pekerjaan...
                                                </option>
                                                <option value="1">Pensiunan</option>
                                                <option value="2">Profesional</option>
                                                <option value="3">Wiraswasta</option>
                                                <option value="4">Karyawan Swasta</option>
                                                <option value="5">PNS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="penghasilan">Penghasilan</label>
                                            <select required class="form-select digits" name="penghasilan"
                                                id="penghasilan">
                                                <option selected="" disabled="" value="">Pilih Penghasilan...
                                                </option>
                                                <option value="1">2.500.000 - 3.499.000</option>
                                                <option value="2">3.500.000 - 5.499.000</option>
                                                <option value="3">5.500.000 - 7.999.000</option>
                                                <option value="4">8.000.000 - 14.999.000</option>
                                                <option value="5">15.000.000 - 50.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="tanggungan">Tanggungan</label>
                                            <select required class="form-select digits" name="tanggungan"
                                                id="tanggungan">
                                                <option selected="" disabled="" value="">Pilih Tanggungan...
                                                </option>
                                                <option value="1">Tidak Ada</option>
                                                <option value="2">1 Tanggungan</option>
                                                <option value="3">2 Tanggungan</option>
                                                <option value="4">3 - 5 Tanggungan</option>
                                                <option value="5">Lebih dari 5 Tanggungan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="kondisiKendaraan">Kondisi Kendaraan</label>
                                            <select required class="form-select digits" name="kondisiKendaraan"
                                                id="kondisiKendaraan">
                                                <option selected="" disabled="" value="">Pilih Kondisi
                                                    Kendaraan...
                                                </option>
                                                <option value="1">Adanya Kerusakan yang serius</option>
                                                <option value="2">Perlu Beberapa Perbaikan</option>
                                                <option value="3">Kondisi Kendaraan wajar, memerlukan perawatan Rutin
                                                </option>
                                                <option value="4">Kondisi Kendaraan terawat, tidak perlu perbaikan
                                                    signifikan</option>
                                                <option value="5">Kendaraan dalam kondisi sangat baik, tampak seperti
                                                    baru</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="statusTempatTinggal">Status Tempat Tinggal</label>
                                            <select required class="form-select digits" name="statusTempatTinggal"
                                                id="statusTempatTinggal">
                                                <option selected="" disabled="" value="">Pilih Status Tempat
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
                        <div class="form-navigation mt-3">
                            <button class="previous btn btn-primary" type="button">Previous</button>
                            <button class="next btn btn-primary " type="button">Next</button>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections.removeClass('current').eq(index).addClass('current');
                $('.form-navigation .previous').toggle(index > 0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [Type=submit]').toggle(atTheEnd);
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }
            $('.form-navigation .previous').click(function() {
                navigateTo(curIndex() - 1);
            });
            $('.form-navigation .next').click(function() {
                $('.theme-forest').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                });
            });
            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });
            navigateTo(0);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\df\Documents\CubaLaravel\resources\views/forms/input-data.blade.php ENDPATH**/ ?>