<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Lembur Pegawai</div>

                <div class="panel-body">
                    <a href="<?php echo e(url('/Lembur_Pegawai')); ?>" class="btn btn-success btn-block">Kembali</a><br>
                    <?php echo Form::model($lempegv,['method'=>'PATCH','route'=>['Lembur_Pegawai.update',$lempegv->id]]); ?>

                        <div class="form-group">
                            <label for="kode_lembur_id" class="form-group">Kode Lembur</label>
                            <div class="form-group">
                                <select name="kode_lembur_id" class="form-control">
                                    <option value="<?php echo e($lempegv->id); ?>">kode Lembur -- <?php echo e($lempegv->kategori_lembur->kode_lembur); ?></option>
                                    <?php $__currentLoopData = $kalemv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->kode_lembur); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pegawai_id" class="form-group">Nama Pegawai</label>
                            <div class="form-group">
                                <select name="pegawai_id" class="form-control">
                                    <option value="<?php echo e($lempegv->id); ?>">Nama Pegawai -- <?php echo e($lempegv->pegawai->User->name); ?></option>
                                    <?php $__currentLoopData = $pegawaiv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo Form::label('Jumlah Jam','Jumlah Jam'); ?>

                            <?php echo Form::number('jumlah_jam',null,['class'=>'form-control']); ?>

                        </div>
                        <div class="form-group">
                            <?php echo Form::submit('update',['class'=>'btn btn-success form-control']); ?>

                        </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>