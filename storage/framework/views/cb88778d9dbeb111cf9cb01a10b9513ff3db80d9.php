<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Rincian Gaji</div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4"><br>
                                    <table class="table table-bordered bg-success"><td><center>Photo</center></td></table>
                                    <img src="<?php echo e(asset('img/'.$pegawaiv->photo.'')); ?>" width="Responsive" height="Responsive" class="img-rounded img-responsive" alt="Responsive image"><br>
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
                                    <label>Tunjangan Pegawai</label>
                                </div>
                            </div>
                    </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>