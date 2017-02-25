<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Rincian Gaji</div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><br>
                                    <table class="table table-bordered bg-success"><td><center>Photo</center></td></table><hr>
                                    <img src="<?php echo e(asset('img/'.$pegawaiv->photo.'')); ?>" width="Responsive" height="Responsive" class="img-rounded img-responsive" alt="Responsive image"><br><hr>
                                    <a href="<?php echo e(url('/Penggajian')); ?>" class="btn btn-success btn-block">Kembali</a><br>
                                </div>
                                <div class="col-md-4"><br>
                                    <table class="table table-bordered bg-success"><td><center>Rincian Data Pegawai</center></td></table>
                                    <label>NIP</label>
                                    <input type="text" name="nip" placeholder="<?php echo e($pegawaiv->nip); ?>" class="form-control" disabled><br>
                                    <label>Nama</label>
                                    <input type="text" name="name" placeholder="<?php echo e($pegawaiv->User->name); ?>" class="form-control" disabled><br>
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan_id" placeholder="<?php echo e($pegawaiv->Jabatan->nama_jabatan); ?>" class="form-control" disabled><br>
                                    <label>Golongan</label>
                                    <input type="text" name="golongan_id" placeholder="<?php echo e($pegawaiv->Golongan->nama_golongan); ?>" class="form-control" disabled><br>
                                    <label>Permission</label>
                                    <input type="text" name="perission" placeholder="<?php echo e($pegawaiv->User->permission); ?>" class="form-control" disabled><br>
                                </div>
                                <div class="col-md-4"><br>
                                    <table class="table table-bordered bg-success"><td><center>Rincian Gaji</center></td></table>
                                        <?php echo Form::open(['url'=>'Penggajian']); ?>

                                            <div class="form-group">
                                                <label>Tunjangan Pegawai</label>
                                                    <input type="text" name="Tunjangan_pegawai_id" value="<?php echo e($pegawaiv->tunjangan_pegawai->kode_tunjangan_id); ?>" readonly><br>
                                                    <table class="table table-bordered"><td><center>Rp. <?php echo e(number_format($pegawaiv->tunjangan_pegawai->tunjangan->besaran_uang)); ?></center></td></table>
                                                <label>Jumlah Jam Lembur</label>
                                                <input type="number" name="jumlah_jam_lembur" class="form-control" placeholder="{{}}" readonly><br>
                                                <?php echo Form::submit('save',['class'=>'btn btn-success form-control']); ?>

                                            </div>
                                        <?php echo Form::close(); ?>

                                </div>
                            </div>
                    </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>